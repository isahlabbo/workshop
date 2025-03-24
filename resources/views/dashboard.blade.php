@extends('layouts.app')

@section('title')
    dashboard
@endsection

@section('content')
    @if(Auth::user()->role == 'admin')
        @foreach(App\Models\Programme::all() as $programme)
            <div class="card-body shadow mb-4">
            <div class="row">
            @foreach($programme->workshops as $workshop)
            <div class="col-md-3">
                <div class="card-body" style="border-width: 0px 0px 0px 4px; border-style: solid; border-color: blue;">
                    <p><i class="{{$workshop->icon}}"></i> <br> {{$workshop->title}}</p>
                    <p style="color: darkblue;">{{count($workshop->applications)}} Applications @if(count($workshop->applications)>0)<br><a href="{{route('schedule.create',[$workshop->id])}}">Create Schedule and Allocate all Registered Participants</a>@endif</p>
                </div>
            </div>
            @endforeach
            </div>
            </div>
        @endforeach
    @elseif(Auth::user()->role == 'facilitator')
    
            <div class="card-body shadow mb-4">
            <div class="row">
            @foreach(Auth::user()->topicAllocations as $topicAllocation)
            <div class="col-md-6">
                <div class="card-body" style="border-width: 0px 0px 0px 4px; border-style: solid; border-color: blue;">
                    <p class="text text-primary"><i class="{{$topicAllocation->topic->workshop->icon}}"></i> <br>You have Workshop Presentation on {{$topicAllocation->topic->workshop->title}}</p>
                    <p><b>Topic:</b> {{$topicAllocation->topic->title}}</p>
                    <p><b>Content to be Cover:</b>
                    @foreach($topicAllocation->topic->subTopics as $subTopic)
                    <li>{{$subTopic->title}}</li>
                    @endforeach
                    </p>
                    <p><b>Centre</b>
                    <table>
                    <tr>
                        <td>Name: </td>
                        <td>{{$topicAllocation->schedule->centre->name}}</td>
                    </tr>
                    <tr>
                        <td>Address: </td>
                        <td>{{$topicAllocation->schedule->centre->address}}</td>
                    </tr>
                    <tr>
                        <td>Capacity: </td>
                        <td>{{$topicAllocation->schedule->centre->capacity}}</td>
                    </tr>
                    <tr>
                        <td>Participants: </td>
                        <td>{{count($topicAllocation->schedule->applications)}}</td>
                    </tr>
                    </table>
                    </p>
                    @if(count($topicAllocation->questions) <1)
                        <div class="alert alert-danger">Pls upload assessment <a href="{{route('schedule.allocation.question.index',[$topicAllocation->id])}}">question of your topic</a></div>
                    @endif
                </div>
            </div>
            @endforeach
            </div>
            </div>
       
    @else
        <p> You have just a step to register for one of our workshop pls fill the form below</p>
        <div class="application">
            <form id="verifyProgramme" action="{{route('programme.verify')}}" method="post">
                @csrf
                <select name="programme" id="programme" class="form-control me-2" aria-label="Input">
                    <option value="">Select Section</option>
                    @foreach(App\Models\Programme::all() as $programme)
                    <option value="{{$programme->id}}">{{$programme->name}}</option>
                    @endforeach
                </select>
            </form>
        </div>

        @foreach(Auth::user()->applications as $application)
        <div class="card-body shadow mt-4">
        <p><i class="{{$application->workshop->icon}}"></i> {{$application->workshop->title}}</p>
       <div class="row">
       <div class="col-md-6">
        <table class="table table-sm table-striped">
            <tr>
                <td >Payment Status:</td>
                <td>{{$application->payment->status ?? 'Pending'}}</td>
            </tr>
            <tr>
                <td>Training Center:</td>
                <td>{{$application->schedule->centre->name ?? 'Pending'}}</td>
            </tr>
            <tr>
                <td>Training Address:</td>
                <td>{{$application->schedule->centre->address ?? 'Pending'}}</td>
            </tr>
            <tr>
                <td>Training Capacity:</td>
                <td>{{$application->schedule->centre->capacity ?? 'Pending'}}</td>
            </tr>
            <tr>
                <td>Time:</td>
                <td>{{date('h:i:a', strtotime($application->schedule->time)) ?? 'Pending'}}</td>
            </tr>
            <tr>
                <td>Start Date:</td>
                <td>{{date('d M, Y', strtotime($application->schedule->start_date)) ?? 'Pending'}}</td>
            </tr>
            <tr>
                <td>End Data:</td>
                <td>{{date('d M, Y', strtotime($application->schedule->end_date)) ?? 'Pending'}}</td>
            </tr>
            <tr>
                <td>Assessment Date:</td>
                <td>{{date('d M, Y', strtotime($application->schedule->assessment_date)) ?? 'Pending'}}</td>
            </tr>
            <tr>
                <td>Certificate Collection:</td>
                <td>{{date('d M, Y', strtotime($application->schedule->certificate_distribution_date)) ?? 'Pending'}}</td>
            </tr>
        </table>
        </div>
       <div class="col-md-6">
       <p>Resources</p>
       </div>
       </div>
        </div>
        @endforeach
    @endif
@endsection

@section('scripts')

<script>
    document.getElementById("programme").addEventListener("change", function() {
        setTimeout(function() {
            document.getElementById("verifyProgramme").submit();
        }, 1000);
    });
</script>

@endsection