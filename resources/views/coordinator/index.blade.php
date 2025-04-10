@extends('layouts.app')
    @section('title')
        available coordinators
    @endsection
    @section('content')
    <table class="table table-sm table-striped" style="color: black;">
        <thead>
            <tr>
                <th>S/N</th>
                <th>NAME</th>
                <th>PROGRAMME</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th>STATUS</th>
                <th><button data-toggle="modal" data-target="#coordinator" class="btn btn-primary btn-sm"><b>+ coordinator</b></button></th>
            </tr>
            @include('coordinator.create')
        </thead>
        <tbody>
            @foreach(App\Models\Coordinator::all() as $coordinator)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$coordinator->user->name}}</td>
                    <td>{{$coordinator->programme->name}}</td>
                    <td>{{$coordinator->user->email}}</td>
                    <td>{{$coordinator->user->phone}}</td>
                    <td>{{$coordinator->status}}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_{{$coordinator->id}}">Edit</button>
                        <a href="{{route('coordinator.delete',[$coordinator->id])}}" onclick="return confirm('Are you sure, you want to delete this coordinator?')"><button class="btn btn-danger btn-sm">Delete</button></a>
                    </td>
                    @include('coordinator.edit')
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
