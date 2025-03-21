@extends('layouts.app')

@section('title')
    dashboard
@endsection

@section('content')
    @if(Auth::user()->role == 'admin')
        Dashboard
    @elseif(Auth::user()->role == 'facilitator')

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
        <table>
            <tr>
                <td width="250">Payment Status:</td>
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
                <td>{{$application->schedule->time ?? 'Pending'}}</td>
            </tr>
            <tr>
                <td>Start Date:</td>
                <td>{{$application->schedule->start_date ?? 'Pending'}}</td>
            </tr>
            <tr>
                <td>End Data:</td>
                <td>{{$application->schedule->end_date ?? 'Pending'}}</td>
            </tr>
            <tr>
                <td>Assessment Date:</td>
                <td>{{$application->schedule->assessment_date ?? 'Pending'}}</td>
            </tr>
            <tr>
                <td>Certificate Collection:</td>
                <td>{{$application->schedule->certificate_distribution_date ?? 'Pending'}}</td>
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