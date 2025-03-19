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