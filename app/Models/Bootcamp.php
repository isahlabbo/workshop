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

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function bootcampFees()
    {
        return $this->hasMany(BootcampFee::class);
    }

    public function getCode()
    {
        $count = 1;
        foreach($this->programme->bootcamps as $bootcamp){
            if($bootcamp->id == $this->id){
                return sprintf("%02d", $count);
            }
            $count++;
        }
    }

    public function totalFees()
    {
        $total = 0;
        foreach($this->bootcampFees as $bootcampFee){
            $total +=$bootcampFee->amount;
        }
        return $total;
    }

    public function updateFees()
    {
        foreach($this->bootcampFees as $bootcampFee){
            $bootcampFee->delete();
        }
        foreach(Fee::all() as $fee){
        $bootcampFee = $fee->bootcampFees()->firstOrCreate(['bootcamp_id'=>$this->id,'amount'=>0]); 
            switch ($bootcampFee->fee->id) {
                case '1':
                    # Tuition
                    $bootcampFee->update(['amount'=>rand(20000, 28000)]);
                    break;
                case '2':
                    # Facilitation
                    $bootcampFee->update(['amount'=>rand(5500, 7700)]);
                    break;
                case '3':
                    # Portal 
                    $bootcampFee->update(['amount'=>rand(2000, 2800)]);
                    break;
                case '4':
                    # Certificate Processing
                    $bootcampFee->update(['amount'=>rand(6000, 8400)]);
                    break;
                case '5':
                    # Maintenance
                    $bootcampFee->update(['amount'=>rand(3500, 4900)]);
                    break;
                case '6':
                    # Materials
                    $bootcampFee->update(['amount'=>rand(5000, 7000)]);
                    break;
                 case '7':
                    # Use of Resouces
                    $bootcampFee->update(['amount'=>rand(3000, 4200)]);
                    break;
                case '8':
                    # Mentorship 
                    $bootcampFee->update(['amount'=>rand(5000, 7000)]);
                    break;
                
                default:
                    # code...
                    break;
            }
            
        }
        
    }
}
