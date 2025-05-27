@extends('layouts.app')

@section('title')
    {{strtolower($programme->name)}}workshops
@endsection

@section('content')
    
        <p> You can also search other types of workshops by selecting the type and wait for some seconds</p>
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
    <h5 class="text text-primary text-center m-4">{{$programme->name}} Workshops</h5>
    <div class="workshops">
    <div class="row">
        @if(count($programme->workshops->where('application', 'open')))
        @foreach($programme->workshops->where('application', 'open') as $workshop)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <i style="color: rgb(0, 150, 215) !important;"class="{{$workshop->icon}} fa-3x mb-3"></i>
                    <h5 class="card-title" style="color: rgb(0,0,64);">{{$workshop->title}}</h5>
                    <p class="card-text">{{$workshop->description}} <a href="{{route('programme.workshop.view',[$workshop->id])}}">view details information and apply here</a></p>
                </div>
            </div>
        </div>
        @endforeach
        @else
            <div class="alert alert-success"> The application of all workshop has been closed</div>
        @endif
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