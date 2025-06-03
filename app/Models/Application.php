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

    public function hasErrorFromCertificateDisplay()
    {
        $message = null;

        if($this->payment->status != 'success'){
            $message = 'Access to your certificate was restricted due to payment pls make your payment now';
        }

        if($this->certificate){
            $message = 'Your certificate was not publish, pls check back next time';
        }

        if(!$this->schedule){
            $message = 'Your Application was not schedule';
        }


        if(!$this->programme()->programme->activeCoordinator()){
            $message = 'There is no active coodinator for your programme';
        }

        return $message;

    }
}
