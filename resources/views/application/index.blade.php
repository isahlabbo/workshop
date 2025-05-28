@extends('layouts.app')
    @section('title')
        applications
    @endsection
    @section('content')
    <table class="table table-sm table-striped" >
        <thead>
            <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Workshop</th>
                <th>Method</th>
                <th>Language</th>
                <th>Schedule</th>
                <th>Registration No</th>
                <th>Payment Status</th>
            </tr>
            
        </thead>
        <tbody>
            @foreach(App\Models\Application::all() as $application)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$application->user->name}}</td>
                    <td>{{$application->user->email}}</a></td>
                    <td>{{$application->programme()->title}}</a></td>
                    <td>{{$application->prefer_method}}</td>
                    <td>{{$application->prefer_language}}</td>
                    <td>{{$application->prefer_schedule}}</td>
                    <td>{{$application->schedule ? $application->registrationNo() : 'has no schedule'}}</td>
                    <td>{{$application->payment->status ?? 'Pending'}}</td>
                   
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
