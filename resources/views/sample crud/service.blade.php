@extends('layouts.app')
    @section('title')
        departments
    @endsection
    @section('content')
    <div class="row">
        <form action="{{route('patient.addservice',[$patient->id])}}" method="post">
        @csrf
        <table class="table" style="color: black;">
        @foreach(App\Models\Service::all() as $service)
            <div class="col-md-6">
                <tr>
                    <td>{{$service->name}}</td>
                    <td><input type="checkbox" name="{{$service->id}}" id=""></td>
                </tr>
            </div>
        @endforeach
        </table>
        <button class="btn btn-primary">Add Services</button>
        </form>
    </div>
    @endsection
