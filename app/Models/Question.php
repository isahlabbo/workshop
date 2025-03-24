<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends BaseModel
{
    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
