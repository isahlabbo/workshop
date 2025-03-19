@extends('layouts.app')

@section('title')
    {{strtolower($programme->name)}}workshops
@endsection

@section('content')
    
        <p> You have just a step to register for one of our workshop pls fill the form below</p>
        <div class="application">
            <form id="verifyProgramme" action="{{route('programme.verify')}}" method="post">
                @csrf
                <select name="programme" id="programme" class="form-control me-2" aria-label="Input">
                    <option value="">Select Section</option>
                    @foreach(App\Models\Programme::all() as $programmeList)
                    <option value="{{$programmeList->id}}">{{$programmeList->name}}</option>
                    @endforeach
                </select>
            </form>
        </div>
    <div class="section">
    <h5 class="text text-primary text-center mt-4">{{$programme->name}} Workshops</h5>
    <div class="workshops">
    <div class="row">
                    @foreach($programme->workshops as $workshop)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <i style="color: rgb(0, 150, 215) !important;"class="{{$workshop->icon}} fa-3x mb-3"></i>
                                <h5 class="card-title" style="color: rgb(0,0,64);">{{$workshop->title}}</h5>
                                <p class="card-text">{{$workshop->description}} <a href="{{route('workshop.view',[$workshop->id])}}">view details information and apply here</a></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
    </div>
    </div>
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