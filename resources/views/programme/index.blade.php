@extends('layouts.app')
    @section('title')
        available programms
    @endsection
    @section('content')
    <table class="table table-sm table-striped" >
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Workshops</th>
                <th>Bootcamps</th>
                
                <th><button data-toggle="modal" data-target="#newProgramme" class="btn btn-primary btn-sm"><b>+Programme</b></button></th>
            </tr>
        </thead>
        @include('programme.create')
        <tbody>
                @foreach(App\Models\Programme::all() as $programme)
                    <tr>
                        <td><i class="{{$programme->icon}}"></i></td>
                        <td>{{$programme->name}}</td>
                        <td><a href="{{route('programme.workshop.index', $programme->id)}}">{{count($programme->workshops)}}</a></td>
                        <td><a href="{{route('programme.bootcamp.index', $programme->id)}}">{{count($programme->bootcamps)}}</a></td>
                        <td><button class="btn btn-outline-info" data-toggle="modal" data-target="#edit_{{$programme->id}}">Edit</button></td>
                    </tr>
                    @include('programme.edit')
                @endforeach
        </tbody>
    </table>
    @endsection
