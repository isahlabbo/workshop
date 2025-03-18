<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends BaseModel
{
    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
