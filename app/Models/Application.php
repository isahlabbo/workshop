<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends BaseModel
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }

    public function bootcamp()
    {
        return $this->belongsTo(Bootcamp::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function registrationNo(Type $var = null)
    {
        return substr($this->created_at,2,2).
                $this->programme()->programme->getCode().
                $this->programme()->getCode().
                $this->getSerialNo();
    }

    public function getSerialNo()
    {
        $count = 1;
        foreach($this->schedule->applications as $application){
            if($application->id == $this->id){
                return sprintf("%03d", $count);
            }
            $count++;
        }
    }

    public function programme()
    {
        if($this->bootcamp){
            return $this->bootcamp;
        }
        return $this->workshop;
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
}
