@extends('layouts.app')

@section('title')
    dashboard
@endsection

@section('content')
    @if(Auth::user()->role == 'admin')
        Dashboard
    @elseif(Auth::user()->role == 'facilitator')

    @else

    @endif
@endsection