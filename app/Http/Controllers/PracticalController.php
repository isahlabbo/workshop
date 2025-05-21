<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Practical;

class PracticalController extends Controller
{
    public function register(Request $request, $topicId)
    {
        $request->validate(['activity'=>'required']);

        $topic = Topic::find($topicId);
        $topic->practicals()->firstOrCreate(['activity'=>$request->activity]);
        return redirect()->route('programme.workshop.topic.index',[$topic->workshop->id])->withToastSuccess('Practical Activity Registered');
    }

    public function update(Request $request, $practicalId)
    {
        $request->validate(['activity'=>'required']);

        $practical = Practical::find($practicalId);
        $practical->update(['activity'=>$request->activity]);
        return redirect()->route('programme.workshop.topic.index',[$practical->topic->workshop->id])->withToastSuccess('Practical Activity Updated');
    }


    public function delete($practicalId)
    {

        $practical = practical::find($practicalId);
       
        $practical->delete();

        return redirect()->route('programme.workshop.topic.index',[$practical->topic->workshop->id])->withToastSuccess('Practical Activity Deleted');
    }
}
