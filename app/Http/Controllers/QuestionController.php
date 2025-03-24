<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TopicAllocation;

class QuestionController extends Controller
{
    public function index($allocationId)
    {
        return view('schedule.allocation.question.index',['allocation'=>TopicAllocation::find($allocationId)]);
    }

    public function register(Request $request, $allocationId)
    {
        $request->validate([
            'question'=>'required',
            'A'=>'required',
            'B'=>'required',
            'C'=>'required',
            'D'=>'required',
            'answer'=>'required',
        ]);

        $allocation = TopicAllocation::find($allocationId);
        $question = $allocation->questions()->create([
            'content'=>$request->question,
        ]);

        foreach($request->all() as $key=>$value){
            if(in_array($key, ['A','B', 'C', 'D'])){
                $question->options()->create([
                    'name'=>$key,
                    'content'=>$value,
                    'answer'=>0
                ]);
            }
        }

        foreach($question->options as $option){
            if($request->answer == $option->name){
                $option->update(['answer'=>1]);
            }
        }
        return redirect()->route('schedule.allocation.question.index',[$allocationId])->withToastSuccess('Question Registered');
    }
}
