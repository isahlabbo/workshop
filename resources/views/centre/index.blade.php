@extends('layouts.app')
    @section('title')
        available centres
    @endsection
    @section('content')
    <table class="table table-sm table-striped" style="color: black;">
        <thead>
            <tr>
                <th>S/N</th>
                <th>NAME</th>
                <th>ADDRESS</th>
                <th>CAPACITY</th>
                <th>CONTACT</th>
                <th><button data-toggle="modal" data-target="#centre" class="btn btn-primary btn-sm"><b>+ Centre</b></button></th>
            </tr>
            @include('centre.create')
        </thead>
        <tbody>
            @foreach(App\Models\Centre::all() as $centre)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$centre->name}}</td>
                    <td>{{$centre->address}}</td>
                    <td>{{$centre->capacity}}</td>
                    <td>{{$centre->contact}}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_{{$centre->id}}">Edit</button>
                        <a href="{{route('centre.delete',[$centre->id])}}" onclick="return confirm('Are you sure, you want to delete this centre?')"><button class="btn btn-danger btn-sm">Delete</button></a>
                    </td>
                    @include('centre.edit')
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
