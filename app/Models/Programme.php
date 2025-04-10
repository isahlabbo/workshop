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
}
