@extends('layouts.app')
    @section('title')
        topic allocation questions
    @endsection
    @section('content')
   <p>{{$allocation->topic->title}} Assessment Qusetion </p>
   <table class="table table-sm table-striped">
        <thead>
            <th>SN</th>
            <th>QUESTION</th>
            <th>OPTIONS</th>
            <th>ANSWER</th>
        </thead>
        <tbody>
        @foreach($allocation->questions as $question)
        <tr>
            <td>Q.{{$loop->iteration}}</td>
            <td>{{$question->content}}</td>
            <td>
            @foreach($question->options as $option)
            <p><b>{{$option->name}}:</b> {{$option->content}}</p>
            @endforeach
            </td>
            <td>
            @foreach($question->options as $option)
            @if($option->answer > 0)
            {{$option->name}}
            @endif
            @endforeach
            </td>
        </tr>
        @endforeach
        </tbody>
   </table>
   <p>
        <form enctype="multipart/form-data" action="{{route('schedule.allocation.question.register',[$allocation->id])}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Question</label>
                <textarea name="question" id="" cols="30" rows="3" class="form-control"></textarea>
            </div>
            <div class="row">
            @foreach(['A', 'B','C','D'] as $questionOption)
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Option {{$questionOption}}</label>
                    <input type="text" name="{{$questionOption}}" class="form-control">
                </div>
            </div>
            @endforeach
            </div>
            <div class="form-group ">
                <label for="">Answer</label>
                <select name="answer" id="" class="input-group form-control">
                <option value="">Select Answer</option>
                @foreach(['A', 'B','C','D'] as $option)
                <option value="{{$option}}">{{$option}}</option>
                @endforeach
                </select>
            </div>
            
            <button class="btn btn-primary">Add Question</button>
        </form>
        </p>
    @endsection
