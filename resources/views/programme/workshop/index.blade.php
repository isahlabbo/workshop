@extends('layouts.app')
    @section('title')
        available workshops
    @endsection
    @section('content')
    <table class="table table-sm table-striped" >
        <thead>
            <tr>
                <th>PROGRAMME</th>
                <th>TITLE</th>
                <th>DESCRIPTION</th>
                <th>FEES</th>
                <th><button data-toggle="modal" data-target="#newWorkshop" class="btn btn-primary btn-sm"><b>+Workshop</b></button></th>
            </tr>
        </thead>
        @include('programme.workshop.create')
        <tbody>
            @foreach(App\Models\Programme::where('type','workshop')->get() as $programme)
                @foreach($programme->workshops as $workshop)
                    <tr>
                        <td>{{$workshop->programme->name}}</td>
                        <td> <i class="{{$workshop->icon}}"></i> {{$workshop->title}}</td>
                        <td>{{$workshop->description}}</td>
                        <td></td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_{{$workshop->id}}">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                    @include('programme.workshop.edit')
                @endforeach
            @endforeach
        </tbody>
    </table>
    @endsection
