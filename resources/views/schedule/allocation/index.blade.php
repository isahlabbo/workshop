@extends('layouts.app')
    @section('title')
        available schedules
    @endsection
    @section('content')
    <table class="table table-sm table-striped" style="color: black;">
        <thead>
            <tr>
                <th>S/N</th>
                <th>TOPIC</th>
                <th>SUB TOPIC</th>
                <th>DAY</th>
                <th>FACILITATOR</th>
                <th></th>
            </tr>
            
        </thead>
        <tbody>
            @foreach($schedule->workshop->topics as $topic)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$topic->title}}</td>
                    <td>
                        <ol>
                        @foreach($topic->subTopics as $subTopic)
                        <li>{{$subTopic->title}}</li>
                        @endforeach
                        </ol>
                    </td>
                    <td>{{$topic->day}}</td>
                    <td>{{$schedule->facilitator($topic)->name?? 'Pending'}}</td>
                    <td><button data-toggle="modal" data-target="#allocate_{{$topic->id}}" class="btn btn-primary btn-sm">Assign Facilitator</button></td>
                </tr>
                @include('schedule.allocation.create')
            @endforeach
        </tbody>
    </table>
    @endsection
