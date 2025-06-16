@extends('layouts.app')
    @section('title')
        edit schedule time for workshops
    @endsection
    @section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card-body">
            <p class="text text-primary h4"><b>Edit Scheduling Time for Workshops</b></p>
                <form action="{{route('schedule.update',[$schedule->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="time">Centre</label>
                        <select name="centre" id="" class="form-control">
                        <option value="{{$schedule->centre->id}}">{{$schedule->centre->name}}</option>
                        @foreach(App\Models\Centre::all() as $centre)
                            @if($centre->id != $schedule->centre->id)
                                <option value="{{$centre->id}}">{{$centre->name}}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="time">Workshop</label>
                        <select name="workshop" id="" class="form-control">
                        <option value="{{$schedule->workshop->id}}">{{$schedule->workshop->title}}</option>
                        @foreach(App\Models\Workshop::where('application', 'open')->get() as $workshop)
                            @if($schedule->workshop->id != $workshop->id)
                            <option value="{{$workshop->id}}">{{$workshop->title}}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="time">Time</label>
                                <input type="time" name="time" class="form-control" value="{{$schedule->time}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="start_date" class="form-control" value="{{$schedule->start_date}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" name="end_date" class="form-control" value="{{$schedule->end_date}}">
                            </div>
                        </div>
                    </div>
            
                    <div class="form-group">
                        <label for="assessment_date">Date of Assessment</label>
                        <input type="date" name="assessment_date" class="form-control" value="{{$schedule->assessment_date}}">
                    </div>

                    <div class="form-group">
                        <label for="certificate_distribution_date">Certificate Distribution Date</label>
                        <input type="date" name="certificate_distribution_date" class="form-control" value="{{$schedule->certificate_distribution_date}}">
                    </div>
                    <button class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
    
    @endsection
