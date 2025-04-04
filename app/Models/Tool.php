<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends BaseModel
{
    public function project()
    {
        return $ths->belongsTo(Project::class);
    }
}
