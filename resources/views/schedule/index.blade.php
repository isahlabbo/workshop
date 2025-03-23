@extends('layouts.app')
    @section('title')
        available schedules
    @endsection
    @section('content')
    <table class="table table-sm table-striped" style="color: black;">
        <thead>
            <tr>
                <th>S/N</th>
                <th>CENTER</th>
                <th>TIME</th>
                <th>START DATE</th>
                <th>END DATE</th>
                <th>ASSESSMENT DATE</th>
                <th>CERTIFICATE DISTRIBUTION DATE</th>
                <th>PARTICIPANTS</th>
                <th><button class="btn btn-primary btn-sm"><b>+ schedule</b></button></th>
            </tr>
            
        </thead>
        <tbody>
            @foreach(App\Models\Schedule::all() as $schedule)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$schedule->centre->name}}</td>
                    <td>{{date('h:i:a', strtotime($schedule->time))}}</td>
                    <td>{{date('d M, Y', strtotime($schedule->start_date))}}</td>
                    <td>{{date('d M, Y', strtotime($schedule->end_date))}}</td>
                    <td>{{date('d M, Y', strtotime($schedule->assessment_date))}}</td>
                    <td>{{date('d M, Y', strtotime($schedule->certificate_distribution_date))}}</td>
                    <td>{{count($schedule->applications)}}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_{{$schedule->id}}"><i class="fas fa-eye"></i> Edit</button>
                        <a href="{{route('schedule.allocation.index',[$schedule->id])}}">
                        <button class="btn btn-primary btn-sm" ><i class="fas fa-share"></i> Allocation</button>
                        </a>
                        <a href="{{route('schedule.delete',[$schedule->id])}}" onclick="return confirm('Are you sure, you want to delete this schedule?')">
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
