@extends('layouts.app')
    @section('title')
        schedule time for workshops
    @endsection
    @section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card-body">
            <p class="text text-primary">Schedule Time for Workshops</p>
                <form action="{{route('schedule.register')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="time">Centre</label>
                        <select name="centre" id="" class="form-control">
                        <option value="">Select Centre</option>
                        @foreach(App\Models\Centre::all() as $centre)
                            <option value="{{$centre->id}}">{{$centre->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="time">Workshop</label>
                        <select name="workshop" id="" class="form-control">
                        <option value="">Select Workshop</option>
                        @foreach(App\Models\Workshop::where('application', 'open')->get() as $workshop)
                            <option value="{{$workshop->id}}">{{$workshop->title}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="time">Time</label>
                                <input type="time" name="time" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="start_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" name="end_date" class="form-control">
                            </div>
                        </div>
                    </div>
            
                    <div class="form-group">
                        <label for="assessment_date">Date of Assessment</label>
                        <input type="date" name="assessment_date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="certificate_distribution_date">Certificate Distribution Date</label>
                        <input type="date" name="certificate_distribution_date" class="form-control">
                    </div>
                    <button class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
    
    @endsection
