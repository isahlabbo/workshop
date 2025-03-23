<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\User as Facilitator;

class AllocationController extends Controller
{
    public function index($scheduleId)
    {
        return view('schedule.allocation.index',['schedule'=>Schedule::find($scheduleId)]);
    }

    public function register(Request $request, $scheduleId, $topicId)
    {
        $request->validate(['facilitator'=>'required']);

        $facilitator= Facilitator::find($request->facilitator);
        $facilitator->topicAllocations()->create(['topic_id'=>$topicId,'schedule_id'=>$scheduleId]);

        return redirect()->route('schedule.allocation.index',[$scheduleId])->withToastSuccess('Topic allocated to '.$facilitator->name);
    }
}
