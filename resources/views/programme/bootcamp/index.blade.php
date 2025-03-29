@extends('layouts.app')
    @section('title')
        available bootcamps
    @endsection
    @section('content')
    <table class="table table-sm table-striped" >
        <thead>
            <tr>
                <th>PROGRAMME</th>
                <th>TITLE</th>
                <th>DESCRIPTION</th>
                <th>FEES</th>
                <th><button data-toggle="modal" data-target="#newBootcamp" class="btn btn-primary btn-sm"><b>+Bootcamp</b></button></th>
            </tr>
        </thead>
        @include('programme.bootcamp.create')
        <tbody>
            @foreach(App\Models\Programme::where('type','bootcamp')->get() as $programme)
                @foreach($programme->bootcamps as $bootcamp)
                    <tr>
                        <td>{{$bootcamp->programme->name}}</td>
                        <td> <i class="{{$bootcamp->icon}}"></i> {{$bootcamp->title}}</td>
                        <td>{{$bootcamp->description}}</td>
                        <td></td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_{{$bootcamp->id}}">Edit</button>
                           <a href="{{route('bootcamp.delete',[$bootcamp->id])}}" onclick="return confirm('Are you sure, you want to delete this bootcamp?')"><button class="btn btn-danger btn-sm">Delete</button></a>
                        </td>
                    </tr>
                    @include('programme.bootcamp.edit')
                @endforeach
            @endforeach
        </tbody>
    </table>
    @endsection
