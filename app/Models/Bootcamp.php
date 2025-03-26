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
}
