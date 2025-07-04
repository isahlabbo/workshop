<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\Centre;
use App\Models\Schedule;
use Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('schedule.index');
    }

    public function create()
    {
        return view('schedule.create');
    }

    public function edit($scheduleId)
    {
        return view('schedule.edit',['schedule'=>Schedule::find($scheduleId)]);
    }

    public function view($scheduleId)
    {
        return view('schedule.view',['schedule'=>Schedule::find($scheduleId)]);
    }

    public function publish($scheduleId)
    {
        $schedule= Schedule::find($scheduleId);

        foreach($schedule->applications as $application){
            $application->certificate()->create([
                'user_id'=>Auth::user()->id,
                'no'=>$application->generateCertificateNo(),
            ]);
        }

        return redirect()->route('dashboard')->withToastSuccess(' All Certificate Were Published');
    }

    public function register(Request $request)
    {
        $centre = Centre::find($request->centre);
       
        $centre->schedules()->firstOrCreate([
            'workshop_id'=>$request->workshop,
            'time'=>$request->time,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'assessment_date'=>$request->assessment_date,
            'certificate_distribution_date'=>$request->certificate_distribution_date,
        ]);
        
        return redirect()->route('schedule.index')->withToastSuccess(' Schedule Registered');
    }

    public function update(Request $request, $scheduleId)
    {
        $schedule = Schedule::find($scheduleId);
       
        $schedule->update([
            'workshop_id'=>$request->workshop,
            'time'=>$request->time,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'assessment_date'=>$request->assessment_date,
            'certificate_distribution_date'=>$request->certificate_distribution_date,
        ]);
        
        return redirect()->route('schedule.index')->withToastSuccess(' Schedule Updated');
    }
}
