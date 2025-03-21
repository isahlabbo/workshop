@extends('layouts.app')
    @section('title')
        applications
    @endsection
    @section('content')
    <table class="table table-sm table-striped" >
        <thead>
            <tr>
                <th>S/N</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>WORKSHOP</th>
                <th>METHOD</th>
                <th>LANGUAGE</th>
                <th>SCHEDULE</th>
                <th>PAYMENT STATUS</th>
            </tr>
            
        </thead>
        <tbody>
            @foreach(App\Models\Application::all() as $application)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$application->user->name}}</td>
                    <td>{{$application->user->email}}</a></td>
                    <td>{{$application->workshop->title}}</a></td>
                    <td>{{$application->method}}</td>
                    <td>{{$application->language}}</td>
                    <td>{{$application->schedule}}</td>
                    <td>{{$application->payment->status}}</td>
                   
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
