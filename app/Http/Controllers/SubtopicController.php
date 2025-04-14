<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubTopic;
use App\Models\Topic;

class SubtopicController extends Controller
{
    

    public function register(Request $request, $topicId)
    {
        $request->validate(['title'=>'required']);

        $topic = Topic::find($topicId);
        $topic->subTopics()->firstOrCreate(['title'=>$request->title]);
        return redirect()->route('programme.workshop.topic.index',[$topic->workshop->id])->withToastSuccess('Sub Topic Registered');
    }

    public function update(Request $request, $subTopicId)
    {
        $request->validate(['title'=>'required']);

        $subTopic = SubTopic::find($subTopicId);
        $subTopic->update(['title'=>$request->title]);
        return redirect()->route('programme.workshop.topic.index',[$subTopic->topic->workshop->id])->withToastSuccess('Sub Topic Updated');
    }


    public function delete($subTopicId)
    {

        $subTopic = SubTopic::find($subTopicId);
       
        $subTopic->delete();

        return redirect()->route('programme.workshop.topic.index',[$subTopic->topic->workshop->id])->withToastSuccess('Sub Topic Deleted');
    }
}
