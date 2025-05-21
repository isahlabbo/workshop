@extends('layouts.app')
    @section('title')
        available {{strtolower($workshop->title)}} topics
    @endsection
    @section('content')
        <div class="card-body shadow mb-2">
        <p><i class="{{$workshop->icon}}"></i> {{$workshop->title}}</p>        
        </div>
        @if(count($workshop->topics) == 0)
        There is no any topic register for this workshop <a href="#" data-toggle="modal" data-target="#newTopic" class="btn btn-sm btn-outline-primary">Add first topic to the Worshop</a>
        @else
        <a href="#" data-toggle="modal" data-target="#newTopic" class="btn btn-sm btn-outline-primary my-2"><i class="fas fa-pen"></i> Add Topic</a>
        @endif
        @include('programme.workshop.topic.create')
            @foreach($workshop->topics as $topic)
                <div class="card-body shadow">
                <p><b>Day {{$loop->iteration}}</b></p>
                    <div class="row">
                        <div class="col-md-5">
                            <p class="mr-4"><b>Topic:</b> {{$topic->title}}
                            <a href="" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#topic_{{$topic->id}}"><i class="fas fa-eye"></i></a>
                            <a href="{{route('programme.workshop.topic.delete',[$topic->id])}}" onclick="return confirm('Are you sure, you want delete this topic?')" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
                            </p>
                        </div>
                        <div class="col-md-7">
                            <p><b>Sub Topic:</b></p>
                            <table class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>
                                            <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#subtopic_{{$topic->id}}"><i class="fas fa-pen"></i></a>
                                        </th>
                                    </tr>
                                    @include('programme.workshop.topic.subtopic.create')
                                </thead>
                                <tbody>
                                @foreach($topic->subTopics as $subTopic)
                                <tr>
                                <td>{{$subTopic->title}}</td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#edit_subtopic_{{$subTopic->id}}" class="btn btn-sm btn-outline-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{route('programme.workshop.topic.subtopic.delete',[$subTopic->id])}}" onclick="return confirm('Are you sure, you want to delete this sub topic?')" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
                                </td>
                                </tr>
                                @include('programme.workshop.topic.subtopic.edit')
                                @endforeach
                                </tbody>
                            </table>
                            
                        
                            <!-- Practical Activities -->
                            <p><b>Practical Activities:</b></p>
                            <table class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Activity</th>
                                        <th>
                                            <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#practical_{{$topic->id}}"><i class="fas fa-pen"></i></a>
                                        </th>
                                    </tr>
                                    @include('programme.workshop.topic.practical.create')
                                </thead>
                                <tbody>
                                @foreach($topic->practicals as $practical)
                                <tr>
                                <td>{{$practical->activity}}</td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#edit_practical_{{$practical->id}}" class="btn btn-sm btn-outline-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{route('programme.workshop.topic.practical.delete',[$practical->id])}}" onclick="return confirm('Are you sure, you want to delete this Practical Activity?')" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
                                </td>
                                </tr>
                                @include('programme.workshop.topic.practical.edit')
                                @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
                @include('programme.workshop.topic.edit')
            @endforeach
    @endsection
