<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends BaseModel
{
    public function months()
    {
        return $this->hasMany(Month::class);
    }

    public function synchronizeData()
    {
        $this->update(['business_comission'=>0, 'staff_comission'=>0, 'maintenance_comission'=>0, 'expenses'=>0, 'share_benefit'=>0]);

        foreach($this->months as $month){
           $month->synchronizeData();
        }

        
    }

    public function computeThisYearExpenses()
    {
        foreach($this->months as $month){
            $month->computeThisMonthExpeenses();
        }
    }

    public function comission()
    {
        $comissions = [];
        foreach($this->months as $month){
            $comissions[] = $month->comission();
        }
        return $comissions;
    }

    public function yearlyShareBenefit()
    {
        $benefits = 0;
        foreach($this->months as $month){
            $benefits += $month->monthlyShareBenefit();
        }
        return $benefits;
    }
}
