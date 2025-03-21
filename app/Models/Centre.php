<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centre extends BaseModel
{
    public function schedules(Type $var = null)
    {
        return $this->hasMany(Schedule::class);
    }
}
