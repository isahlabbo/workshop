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

    public function workshopFees()
    {
       return $this->hasMany(WorkshopFee::class);
    }

    public function applications()
    {
       return $this->hasMany(Application::class);
    }

    public function schedules()
    {
       return $this->hasMany(Schedule::class);
    }

    public function totalFees()
    {
        $total = 0;
        foreach($this->workshopFees as $workshopFee){
            $total +=$workshopFee->amount;
        }
        return $total;
    }

    public function getCode()
    {
        $count = 1;
        foreach($this->programme->workshops as $workshop){
            if($workshop->id == $this->id){
                return sprintf("%02d", $count);
            }
            $count++;
        }
    }

    public function allocateThisParticipant(Application $application)
    {
        $schedule = $this->schedules->where('status', 'open')->first();

        if($schedule && count($schedule->applications) < $schedule->centre->capacity){
            $application->update(['status'=>'allocated','schedule_id'=>$schedule->id]);
        }else{
            $application->update(['status'=>'centre closed']);
        }
    }

    public function updateFees()
    {
        foreach($this->workshopFees as $workshopFee){
            $workshopFee->delete();
        }
        foreach(Fee::all() as $fee){
        $workshopFee = $fee->workshopFees()->firstOrCreate(['workshop_id'=>$this->id,'amount'=>0]); 
            switch ($workshopFee->fee->id) {
                case '1':
                    # Tuition
                    $workshopFee->update(['amount'=>rand(4000, 5600)]);
                    break;
                case '2':
                    # Facilitation
                    $workshopFee->update(['amount'=>rand(1100, 1540)]);
                    break;
                case '3':
                    # Portal 
                    $workshopFee->update(['amount'=>rand(400, 560)]);
                    break;
                case '4':
                    # Certificate Processing
                    $workshopFee->update(['amount'=>rand(1200, 1680)]);
                    break;
                case '5':
                    # Maintenance
                    $workshopFee->update(['amount'=>rand(700, 980)]);
                    break;
                case '6':
                    # Materials
                    $workshopFee->update(['amount'=>rand(1000, 1400)]);
                    break;
                 case '7':
                    # Use of Resouces
                    $workshopFee->update(['amount'=>rand(600, 840)]);
                    break;
                case '8':
                    # Mentorship 
                    $workshopFee->update(['amount'=>rand(1000, 1400)]);
                    break;
                
                default:
                    # code...
                    break;
            }
            
        }
        
    }
}
