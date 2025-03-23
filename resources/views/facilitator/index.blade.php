@extends('layouts.app')
    @section('title')
        available facilitators
    @endsection
    @section('content')
    <table class="table table-sm table-striped" style="color: black;">
        <thead>
            <tr>
                <th>S/N</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th><button data-toggle="modal" data-target="#facilitator" class="btn btn-primary btn-sm"><b>+ Facilitator</b></button></th>
            </tr>
            @include('facilitator.create')
        </thead>
        <tbody>
            @foreach(App\Models\User::where('role','facilitator')->get() as $facilitator)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$facilitator->name}}</td>
                    <td>{{$facilitator->email}}</td>
                    <td>{{$facilitator->phone}}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_{{$facilitator->id}}">Edit</button>
                        <a href="{{route('facilitator.delete',[$facilitator->id])}}" onclick="return confirm('Are you sure, you want to delete this facilitator?')"><button class="btn btn-danger btn-sm">Delete</button></a>
                    </td>
                    @include('facilitator.edit')
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
