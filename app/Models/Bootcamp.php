<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bootcamp extends BaseModel
{
    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function bootcampFees()
    {
        return $this->hasMany(BootcampFee::class);
    }

    public function totalFees()
    {
        $total = 0;
        foreach($this->bootcampFees as $bootcampFee){
            $total +=$bootcampFee->fee->amount;
        }
        return $total;
    }
}
