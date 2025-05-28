<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends BaseModel
{
    public function workshops()
    {
        return $this->hasMany(Workshop::class);
    }

    public function bootcamps()
    {
        return $this->hasMany(Bootcamp::class);
    }

    public function coordinators()
    {
        return $this->hasMany(Coordinator::class);
    }

    public function activeCoordinator()
    {
        return $this->coordinators->where('status', 'active')->first();
    }

    public function getCode()
    {
        $count = 1;
        foreach(Programme::all() as $programme){
            if($programme->id == $this->id){
                return sprintf("%02d", $count);
            }
            $count++;
        }
    }

   
}
