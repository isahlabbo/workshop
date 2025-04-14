@extends('layouts.app')
    @section('title')
        available {{strtolower($programme->name)}} workshops
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
                @foreach($programme->workshops as $workshop)
                    <tr>
                        <td>{{$workshop->programme->name}}</td>
                        <td> <i class="{{$workshop->icon}}"></i> {{$workshop->title}}</td>
                        <td>{{$workshop->description}}</td>
                        <td><b>{{number_format($workshop->totalFees(),2)}}</b></td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_{{$workshop->id}}">Edit</button>
                           <a href="{{route('programme.workshop.delete',[$workshop->id])}}" onclick="return confirm('Are you sure, you want to delete this workshop?')"><button class="btn btn-danger btn-sm">Delete</button></a>
                           <a href="{{route('programme.workshop.topic.index',[$workshop->id])}}" onclick=""><button class="btn btn-info btn-sm">Curriculum</button></a>
                        </td>
                    </tr>
                    @include('programme.workshop.edit')
                @endforeach
        </tbody>
    </table>
    @endsection
