@extends('layouts.app')

@section('title')
    dashboard
@endsection

@section('content')
    @if(Auth::user()->role == 'admin')
    <div class="row">
    @foreach(App\Models\Schedule::all() as $schedule)
        <div class="col-md-6">
            <div class="card-body shadow">
                <h5 class="text text-primary"><i class="{{$schedule->workshop->icon}}"></i> <b>{{$schedule->workshop->title}}</b></h5>
                <table>
                    <tr>
                        <td width="40%"><b>Centre Name:</b> </td>
                        <td>{{$schedule->centre->name}}</td>
                    </tr>
                    <tr>
                        <td><b>Address:</b> </td>
                        <td>{{$schedule->centre->address}}</td>
                    </tr>
                    <tr>
                        <td><b>Capacity:</b> </td>
                        <td>{{$schedule->centre->capacity}}</td>
                    </tr>
                    <tr>
                        <td><b>Participants:</b> </td>
                        <td>{{count($schedule->applications)}}</td>
                    </tr>
                    <tr>
                        <td><b>Start Dtae:</b> </td>
                        <td>{{date('d M, Y',strtotime($schedule->start_date))}}</td>
                    </tr>
                    <tr>
                        <td><b>End Date:</b> </td>
                        <td>{{date('d M, Y',strtotime($schedule->end_date))}}</td>
                    </tr>
                    <tr>
                        <td><b>Assessment Date:</b> </td>
                        <td>{{date('d M, Y',strtotime($schedule->assessment_date))}}</td>
                    </tr>
                    <tr>
                        <td><b>Certificate Distribution Date:</b> </td>
                        <td>{{date('d M, Y',strtotime($schedule->certificate_distribution_date))}}</td>
                    </tr>

                    <tr>
                        <td><b>Time:</b> </td>
                        <td>{{date('h: ia',strtotime($schedule->time))}}</td>
                    </tr>
                    <tr>
                        <td><b>Progress:</b> </td>
                        <td>{{$schedule->status}}</td>
                    </tr>
                    </table>
            </div>
        </div>
    @endforeach
        
    </div>
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
                        <td>Name:</b> </td>
                        <td>{{$topicAllocation->schedule->centre->name}}</td>
                    </tr>
                    <tr>
                        <td>Address:</b> </td>
                        <td>{{$topicAllocation->schedule->centre->address}}</td>
                    </tr>
                    <tr>
                        <td>Capacity:</b> </td>
                        <td>{{$topicAllocation->schedule->centre->capacity}}</td>
                    </tr>
                    <tr>
                        <td>Participants:</b> </td>
                        <td>{{count($topicAllocation->schedule->applications)}}</td>
                    </tr>
                    </table>
                    </p>
                    @if(count($topicAllocation->questions) < 5)
                        <div class="alert alert-danger">Pls upload assessment <a href="{{route('schedule.allocation.question.index',[$topicAllocation->id])}}">question of your topic</a></div>
                    @endif
                </div>
            </div>
            @endforeach
            </div>
            </div> 
    @else
   
        @if(count(Auth::user()->applications)>0)
        <p> You can register for another workshop or bootcamp here, just select a category and wait for a 2 seconds</p>
        @else
        <p> You have just few steps to register for your first bootcamp or workshop just select a category and wait for a 2 seconds</p>
        @endif
        <div class="application">
            <form id="verifyProgramme" action="{{route('programme.verify')}}" method="post">
                @csrf
                <select name="programme" id="programme" class="form-control me-2" aria-label="Input">
                    <option value="">Select Section</option>
                    @foreach(App\Models\Programme::all() as $programme)
                    <option value="{{$programme->id}}">{{$programme->name}} {{ucwords($programme->type)}}</option>
                    @endforeach
                </select>
            </form>
        </div>

        @foreach(Auth::user()->applications as $application)
        <div class="card-body shadow mt-4">
        @if($application->payment && $application->payment->status == 'success')
        <p>Your application to <i class="{{$application->programme()->icon}}"></i> <em>{{$application->programme()->title}}</em> was recieved and your payment status is <b>{{$application->payment->status}}</b></p>
       @else
       <p>Your application to <i class="{{$application->programme()->icon}}"></i> <em>{{$application->programme()->title}}</em> was recieved but your payment status is <b>{{$application->payment->status ?? 'Not Successfull'}}</b> <a href="" data-toggle="modal" data-target="#pay">you can try your payment again here</a></p>
       @php 
        $programme = $application->programme();
       @endphp
       @include('payment.pay')
       @endif
       <div class="row">
       <div class="col-md-6">
        @if($application->schedule)
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
        @else
        <div class="alert alert-warning">Your application scheduling is not approve please checkback next time, 
        <b>If this has taken a while <a href="{{route('application.schedule',[$application->id])}}">you can send re-schedule Request here</a></b>
        </div>
        @endif
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