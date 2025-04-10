<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinator extends BaseModel
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }
}
