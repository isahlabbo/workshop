<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentAttempt extends BaseModel
{
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
