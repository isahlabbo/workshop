@extends('layouts.app')
    @section('title')
        available productions
    @endsection
    @section('content')
    <table class="table" style="color: black;">
        <thead>
            <tr>
                <th>S/N</th>
                <th>NAME</th>
                <th>QUANTITY</th>
                <th>PRICE</th>
                <th><button data-toggle="modal" data-target="#addProduction" class="btn custom-btn"><b>+</b></button></th>
            </tr>
            @include('production.create')
        </thead>
        <tbody>
            @foreach($productions as $production)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$production->name}}</td>
                    <td>{{$production->quantity}}</a></td>
                    <td>{{$production->price}}</a></td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$production->id}}">Edit</button>
                        <a href="{{route('production.delete',[$production->id])}}" onclick="return confirm('Are you sure, you want to delete this production?')"><button class="btn btn-danger">Delete</button></a>
                    </td>
                    @include('production.edit')
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
