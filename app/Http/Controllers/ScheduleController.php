<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\Centre;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function create($workshopId)
    {
        return view('schedule.create',['workshop'=>Workshop::find($workshopId)]);
    }

    public function register(Request $request, $workshopId)
    {
        $centre = Centre::find($request->centre);
        
        $schedule = Schedule::where('status','open')->first();

        if(!$schedule){
            $schedule = $centre->schedules()->create([
                'workshop_id'=>$request->workshopId,
                'time'=>$request->time,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'assessment_date'=>$request->assessment_date,
                'certificate_distribution_date'=>$request->certificate_distribution_date,
            ]);
        }

        $workshop = Workshop::find($workshopId);
        $allocated = 0;
        foreach($workshop->applications as $application){
            if($application->status = 'pending' && count($schedule->applications) < $schedule->centre->capacity){
                $application->update(['status'=>'allocated','schedule_id'=>$schedule->id]);
                $allocated++;
            }else{
                $schedule->update(['status'=>'close']);
            }
        }
        return redirect()->route('dashboard')->withToastSuccess($allocated. ' Participants Allocated');
    }
}
