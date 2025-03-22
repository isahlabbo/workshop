<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends BaseModel
{
    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }

    public function centre()
    {
        return $this->belongsTo(Centre::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
