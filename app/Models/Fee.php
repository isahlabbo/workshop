<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends BaseModel
{
    public function workshopFees()
    {
       return $this->hasMany(WorkshopFee::class);
    }

    public function bootcampFees()
    {
       return $this->hasMany(BootcampFee::class);
    }
}
