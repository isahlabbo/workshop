<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends BaseModel
{
    public function days()
    {
        return $this->hasMany(Day::class);
    }

    public function month()
    {
        return $this->belongsTo(Month::class);
    }

    public function staffWorkCounts(User $user)
    {
        $count =0;
        foreach($this->days as $day){
            $count += $day->staffWorkCounts($user);
        }

        return $count;
    }

    public function synchronizeData()
    {
        $this->update(['business_comission'=>0, 'staff_comission'=>0, 'maintenance_comission'=>0, 'expenses'=>0, 'share_benefit'=>0]);
        foreach($this->days as $day){
           $day->synchronizeData();
        }
    }

    public function computeThisWeekExpenses()
    {
        foreach($this->days as $day){
            $day->computeThisDayExpenses();
        }
        
    }

    public function serviceRevenue(Service $service)
    {
        $revenue = 0;

        foreach($this->days as $day){
            $revenue += $day->serviceRevenue($service); 
        }
        
        return $revenue;
    }

    public function comission()
    {
        $shop = 0;
        $users = 0;
        $maintenance = 0;
        $total = 0;
        $expenses = 0;

        foreach($this->days as $day){
            $shop += $day->comission()['shop'];
            $users += $day->comission()['users'];
            $maintenance += $day->comission()['maintenance'];
            $total += $day->comission()['total'];
            $expenses += $day->comission()['expenses'];
        }
        return [
            'shop' => $shop,
            'users' => $users,
            'maintenance' => $maintenance,
            'total' => $total,
            'expenses' => $expenses,
        ];
    }

    public function userComission($userId)
    {
        $total = 0;
        $paid = 0;
        $balance = 0;
       
        foreach($this->days as $day){
            $comission = $day->userComission($userId);
            $total += $comission['total'];
            $paid += $comission['paid'];
            $balance += $comission['balance'];
        }
        
        return [
            'total'=>$total,
            'paid'=>$paid,
            'balance'=>$balance,
        ];
    }

    public function weeklyShareBenefit()
    {
        $benefits = 0;
        foreach($this->days as $day){
            $benefits += $day->dailyShareBenefit();
        }
        return $benefits;
    }
}
