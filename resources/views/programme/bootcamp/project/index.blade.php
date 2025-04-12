@extends('layouts.app')
    @section('title')
        {{$bootcamp->title}} curriculum
    @endsection
    @section('content')
    
    @foreach($bootcamp->projects as $project)
         @include('programme.bootcamp.project.edit')
            <div class="card-body shadow mb-4">
                <h6 class="btn btn-sm btn-outline-primary"><b>Project ({{$loop->iteration}}) {{$project->name}}</b></h6>
                <p>{{$project->description}} 
                <a href="{{route('programme.bootcamp.project.delete',[$project->id])}}" onclick="return confirm('Are you sure, you want delete this project?')" class="btn btn-sm btn-outline-danger "><i class="fas fa-trash"></i></a>
                <a href="#" data-toggle="modal" data-target="#edit_{{$project->id}}" class="btn btn-sm btn-outline-warning"><i class="fas fa-pen"></i></a>
                <div class="row">
                <div class="col-md-7">
                    <h6>Procedures</h6>
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Title</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($project->steps as $step)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$step->title}}</td>
                            <td> 
                                <a href="{{route('programme.bootcamp.project.step.delete',[$step->id])}}" onclick="return confirm('Are you sure, you want to delete this project procedure?')" class="btn btn-sm btn-outline-danger "><i class="fas fa-trash"></i></a>
                                <a href="#" data-toggle="modal" data-target="#edit_{{$step->id}}"class="btn btn-sm btn-outline-warning"><i class="fas fa-pen"></i></a>
                            </td>
                        </tr>
                        @include('programme.bootcamp.project.step.edit')
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="col-md-5">
                
                <h6>Tools to Use</h6>
                <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Title</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($project->tools as $tool)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$tool->name}}</td>
                            <td> 
                                <a href="" class="btn btn-sm btn-outline-danger "><i class="fas fa-trash"></i></a>
                                <a href="" class="btn btn-sm btn-outline-warning"><i class="fas fa-pen"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                </div>
            </div>
    @endforeach
   
    @endsection
