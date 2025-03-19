<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkshopFee extends BaseModel
{
    public function fee()
    {
        return $this->belongsTo(Fee::class);
    }
    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }
}
