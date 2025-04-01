@extends('layouts.app')
    @section('title')
        calendars
    @endsection
    @section('content')
            
        <div class="row">
            @foreach(App\Models\Year::all() as $year)
            <div class="col-md-2">
                <div class="card-body shadow">
                    <h4 class="text text-center">{{$year->name}}</h4>
                </div>
            </div>
            @endforeach
            <div class="col-md-2">
                <div class="card-body shadow">
                    <button data-toggle="modal" data-target="#newCalendar" class="btn btn-primary"><b>+ Calendar</b></button></th>
                    @include('calendar.create')
                </div>
            </div>
        </div>
    @endsection
