<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\Topic;

class TopicController extends Controller
{
    public function index($workshopId)
    {
        return view('programme.workshop.topic.index', ['workshop'=>Workshop::find($workshopId)]);
    }

    public function register(Request $request, $workshopId)
    {
        $request->validate(['title'=>'required']);

        $workshop = Workshop::find($workshopId);
        $workshop->topics()->firstOrCreate(['title'=>$request->title]);
        return redirect()->route('programme.workshop.topic.index',[$workshopId])->withToastSuccess('Topic Registered');
    }

    public function update(Request $request, $topicId)
    {
        $request->validate(['title'=>'required']);

        $topic = Topic::find($topicId);
        $topic->update(['title'=>$request->title]);
        return redirect()->route('programme.workshop.topic.index',[$topic->workshop->id])->withToastSuccess('Topic Updated');
    }


    public function delete($topicId)
    {

        $topic = Topic::find($topicId);

        foreach($topic->subTopics as $subTopic){
            $subTopic->delete();
        }
        $topic->delete();

        return redirect()->route('programme.workshop.topic.index',[$topic->workshop->id])->withToastSuccess('Topic Deleted');
    }
}
