@extends('layouts.app')
    @section('title')
        applications
    @endsection
    @section('content')
    <table class="table table-sm table-striped" >
        <thead>
            <tr>
                <th>S/N</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>WORKSHOP</th>
                <th>AMOUNT</th>
                <th>STATUS</th>
                <th>ATTEMPTS</th>
            </tr>
            
        </thead>
        <tbody>
            @foreach(App\Models\Payment::all() as $payment)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$payment->application->user->name}}</td>
                    <td>{{$payment->application->user->email}}</a></td>
                    <td>{{$payment->application->workshop->title}}</a></td>
                    <td>{{number_format($payment->amount, 2)}}</a></td>
                    <td>{{$payment->status}}</a></td>
                    <td>{{count($payment->paymentAttempts)}}</td>
                   
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
