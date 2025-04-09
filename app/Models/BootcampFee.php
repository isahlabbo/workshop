<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BootcampFee extends BaseModel
{
    public function bootcamp()
    {
        return $this->belongsTo(Bootcamp::class);
    }

    public function fee()
    {
        return $this->belongsTo(Fee::class);
    }
}
