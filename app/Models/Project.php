<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends BaseModel
{
    public function tools()
    {
        return $this->hasMany(Tool::class);
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }
}
