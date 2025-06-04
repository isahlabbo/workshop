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
                <th>
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
                        
                        <a href="{{route('schedule.publish',[$schedule->id])}}" onclick="return confirm('Are you sure, you want to Publish all the certificates? Note that, publishing the certificate will give participant access to download their Certificate')">
                        <button class="btn btn-outline-warning btn-sm"><i class="fas fa-publish"></i> Publish Certificates</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
