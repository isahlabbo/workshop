<?php

namespace App\Models;

use App\Events\ExpenseRegistered;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends BaseModel
{
    public function works()
    {
        return $this->hasMany(Work::class);
    }

    public function week()
    {
        return $this->belongsTo(Week::class);
    }

    public function dailyExpenses()
    {
        return $this->hasMany(DailyExpense::class);
    }

    public function purchaseProductSales()
    {
        return $this->hasMany(PurchaseProductSale::class);
    }

    public function synchronizeData()
    {
        $this->update(['business_comission'=>0, 'staff_comission'=>0, 'maintenance_comission'=>0, 'expenses'=>0, 'share_benefit'=>0]);
        foreach($this->works as $work){
           $work->synchronizeData();
        }

        $this->computeThisDayExpenses();
    }

    public function computeThisDayExpenses()
    {
        foreach($this->dailyExpenses as $dailyExpense){
            event(new ExpenseRegistered($dailyExpense));
        }
        
    }

    public function staffWorkCounts(User $user)
    {
        $count =0;
        foreach($this->works->where('user_id', $user->id) as $work){
            $count ++;
        }

        return $count;
    }

    public function sales()
    {
        $revenue = 0;
        foreach($this->purchaseProductSales as $sale){
            $revenue += $sale->profit();
        }
        
        return ['revenue'=>$revenue];
    }

    public function getExpenses()
    {
        $expense = 0;
        foreach($this->dailyExpenses as $weeklyExpense){
            $expense += $weeklyExpense->amount;
        }

        return $expense;
    }

    public function serviceRevenue(Service $service)
    {
        $revenue = 0;

        foreach($this->works as $work){
            if($work->service->id == $service->id){
                $revenue += $work->amount; 
            }
        }
        
        return $revenue;
    }

    public function comission()
    {
        $shop = 0;
        $users = 0;
        $maintenance = 0;
        $total = 0;

        foreach($this->works as $work){
            $shop += $work->comission()['shop'];
            $users += $work->comission()['user'];
            $maintenance += $work->comission()['maintenance'];
            $total += $work->comission()['total'];
        }
        return [
            'shop' => $shop,
            'users' => $users,
            'maintenance' => $maintenance,
            'total' => $total,
            'expenses' => $this->getExpenses(),
            'cash' => $this->recievedMony()['cash'],
            'transfer' => $this->recievedMony()['transfer'],
            'online' => $this->recievedMony()['online'],
        ];
    }

    public function revenue()
    {

        return [
            'service'=>$this->comission()['shop'],
            'sales'=>$this->sales()['revenue'],
        ];
        
    }

    public function recievedMony()
    {
        $cash = 0;
        $transfer = 0;
        $online = 0;
        foreach($this->works as $work){
            switch ($work->paid_with) {
                case '3':
                    $online += $work->amount;
                    break;
                case '2':
                    $transfer += $work->amount;
                    break;
                default:
                    $cash += $work->amount;
                    break;
            }
        }
        
        return [
            'cash'=>$cash,
            'transfer'=>$transfer,
            'online'=>$online,
        ];
    }
    public function userComission($userId)
    {
        $total = 0;
        $paid = 0;
        $balance = 0;
       
        foreach($this->works->where('user_id',$userId) as $work){
            $total += $work->comission()['user'];
            $paid += $work->comission()['paid'];
            $balance += $work->comission()['balance'];
        }
        
        return [
            'total'=>$total,
            'paid'=>$paid,
            'balance'=>$balance,
        ];
       
    }

    public function getTimeCountdown()
    {
        $now = new \DateTime();
        $endOfDay = new \DateTime('tomorrow midnight');
        $interval = $now->diff($endOfDay);
        return [
            'hours' => $interval->h,
            'minutes' => $interval->i,
            'seconds' => $interval->s,
        ];
    }

    public function dailyShareBenefit()
    {
        return $this->comission()['shop'] / $this->totalNumberofShares();
    }

}
