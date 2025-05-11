@extends('layouts.app')
    @section('title')
        available participants
    @endsection
    @section('content')
    <table class="table table-sm table-striped" style="color: black;" id="myTable">
        <thead>
            <tr>
                <th>S/N</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>PHONE</th>
               
                <th><button data-toggle="modal" data-target="#participant" class="btn btn-primary btn-sm"><b>+ Participant</b></button></th>
            </tr>
            @include('participant.create')
        </thead>
        <tbody>
            @foreach(App\Models\User::where('role', 'participant')->get() as $participant)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$participant->name}}</td>
                    <td>{{$participant->email}}</td>
                    <td>{{$participant->phone}}</td>
                    <td>
                        <button class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#edit_{{$participant->id}}"><i class="fas fa-pen"></i></button>
                        <a href="{{route('participant.delete',[$participant->id])}}" onclick="return confirm('Are you sure, you want to delete this participant?')"><button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></button></a>
                    </td>
                    @include('participant.edit')
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
