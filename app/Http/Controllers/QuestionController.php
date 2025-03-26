<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TopicAllocation;
use App\Models\Question;

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

    public function update(Request $request, $questionId)
    {
       
        $request->validate([
            'question'=>'required',
            'A'=>'required',
            'B'=>'required',
            'C'=>'required',
            'D'=>'required',
            'answer'=>'required',
        ]);

        $question = Question::find($questionId);
      
        $question->update([
            'content'=>$request->question,
        ]);

        foreach($question->options as $option){
            foreach($request->all() as $key=>$value){
                if($option->name == $key){
                    $option->update([
                        'content'=>$value,
                        'answer'=>0
                    ]);
                }
                if($request->answer == $option->name){
                    $option->update(['answer'=>1]);
                }
            }
        }

    
        return redirect()->route('schedule.allocation.question.index',[$question->topicAllocation->id])->withToastSuccess('Question Updated');
    }

    public function delete($questionId)
    {
       
        

        $question = Question::find($questionId);
      
        foreach($question->options as $option){
           $option->delete();
        }

        $question->delete();

    
        return redirect()->route('schedule.allocation.question.index',[$question->topicAllocation->id])->withToastSuccess('Question Deleted');
    }
}
