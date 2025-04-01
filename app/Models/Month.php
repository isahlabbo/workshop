<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Charts\MonthlyWorkReport;

class Month extends BaseModel
{
    public function weeks()
    {
        return $this->hasMany(Week::class);
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public function userMonthlyPayouts()
    {
        return $this->hasMany(UserMonthlyPayout::class);
    }

    public function monthlyRentValue()
    {
        return config('app.rent_value')/12;
    }

    public function synchronizeData()
    {
        $this->update(['business_comission'=>0, 'staff_comission'=>0, 'maintenance_comission'=>0, 'expenses'=>0, 'share_benefit'=>0]);
        foreach($this->weeks as $week){
           $week->synchronizeData();
        }
        
    }

    public function computeThisMonthExpenses()
    {
        foreach($this->weeks as $week){
            $week->computeThisWeekExpenses();
        } 
    }

    public function staffWorkCounts(User $user)
    {
        $count =0;
        foreach($this->weeks as $week){
            $count += $week->staffWorkCounts($user);
        }

        return $count;
    }


    public function serviceRevenue(Service $service)
    {
        $revenue = 0;

        foreach($this->weeks as $week){
            $revenue += $week->serviceRevenue($service); 
        }

        return $revenue;
    }

    public function userComission($userId)
    {
        $total = 0;
        $paid = $this->userMonthlyPays(User::find($userId));

        foreach($this->weeks as $week){
            $comission = $week->userComission($userId);
            $total += $comission['total'];
        }

       
        return [
            'total'=>$total,
            'paid'=>$paid,
            'balance'=>$total-$paid
        ];
    }

    public function userMonthlyPays(User $user)
    {
        $amount = 0;
        
        foreach($this->userMonthlyPayouts as $pay){
            if($pay->user_id == $user->id){
                $amount += $pay->amount;
            }
        }
        return $amount;
    }

    public function comission()
    {
        $shop = 0;
        $users = 0;
        $maintenance = 0;
        $total = 0;
        $expenses = 0;

        foreach($this->weeks as $week){
            $shop += $week->comission()['shop'];
            $users += $week->comission()['users'];
            $maintenance += $week->comission()['maintenance'];
            $total += $week->comission()['total'];
            $expenses += $week->comission()['expenses'];
        }
        return [
            'shop' => $shop,
            'users' => $users,
            'maintenance' => $maintenance,
            'total' => $total,
            'expenses' => $expenses,
        ];
    }

    public function monthlyShareBenefit()
    {
        $benefits = 0;
        foreach($this->weeks as $week){
            $benefits += $week->weeklyShareBenefit();
        }
        return $benefits;
    }
   
    public function nextMonth()
    {
        if($month = Month::find($this->id+1)){
            return $month;
        }
        return false;
    }

    public function previousMonth()
    {
        if($month = Month::find($this->id-1)){
            return $month;
        }
        return false;
    }
}
