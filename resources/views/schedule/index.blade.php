@extends('layouts.app')
    @section('title')
        available schedules
    @endsection
    @section('content')
    <table class="table table-sm table-striped" style="color: black;">
        <thead>
            <tr>
                <th>S/N</th>
                <th>WORKSHOP</th>
                <th>CENTER</th>
                <th>TIME</th>
                <th>START DATE</th>
                <th>END DATE</th>
                <th>ASSESSMENT DATE</th>
                <th>CERTIFICATE DISTRIBUTION DATE</th>
                <th>PARTICIPANTS</th>
                <th><a href="{{route('schedule.create')}}">
                <button class="btn btn-primary btn-sm"><b>+ schedule</b></button>
                </a>
                </th>
            </tr>
            
        </thead>
        <tbody>
            @foreach(App\Models\Schedule::all() as $schedule)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$schedule->workshop->title}}</td>
                    <td>{{$schedule->centre->name}}</td>
                    <td>{{date('h:ia', strtotime($schedule->time))}}</td>
                    <td>{{date('d M, Y', strtotime($schedule->start_date))}}</td>
                    <td>{{date('d M, Y', strtotime($schedule->end_date))}}</td>
                    <td>{{date('d M, Y', strtotime($schedule->assessment_date))}}</td>
                    <td>{{date('d M, Y', strtotime($schedule->certificate_distribution_date))}}</td>
                    <td>{{count($schedule->applications)}}</td>
                    <td>
                       <a href="{{route('schedule.edit',$schedule->id)}}"><button class="btn btn-warning btn-sm" ><i class="fas fa-eye"></i> Edit</button></a> 
                        <a href="{{route('schedule.allocation.index',[$schedule->id])}}">
                        <button class="btn btn-primary btn-sm" ><i class="fas fa-share"></i> Facilitators Allocation</button>
                        </a>
                        <a href="{{route('schedule.delete',[$schedule->id])}}" onclick="return confirm('Are you sure, you want to delete this schedule?')">
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
