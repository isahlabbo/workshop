@extends('layouts.app')

@section('title')
    {{strtolower($workshop->title)}}application
@endsection

@php 
$programme = $workshop;
@endphp

@section('content')
    
    <div class="details">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
            <div class="card-body shadow mb-4">
                <h4 class="text text-primary text-center" style="color: white;" >{{$workshop->title}}</h4>
                <p class="text text-justify">{{$workshop->description}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="schedules">
    <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card-body shadow mb-4">
                    <h4 class="text text-primary text-center">SCHEDULES</h4>
                    <table class="table table-stripped table-sm">
                        <thead>
                            <th>DAY</th>
                            <th>FACILITATOR</th>
                            <th>TOPIC</th>
                            <th>SUB TOPICS</th>
                        </thead>
                        <tbody>
                        @foreach($workshop->topics as $topic)
                        
                        <tr>
                        <td>Day {{$topic->day}}</td>
                        <td></td>
                        <td>{{$topic->title}}</td>
                        <td>
                            <ul>
                            @foreach($topic->subTopics as $subTopic)
                                <li>{{$subTopic->title}}</li>
                            @endforeach
                            </ul>
                        </td>
                        </tr>
                        @endforeach
                        
                        </tbody>
                        
                    </table>
                </div>
            
            </div>
        </div>
    </div>

    <div class="invoice">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card-body shadow mb-4">
                    <h1 class="text text-primary text-center">INVOICE</h1>
                    <table class="table table-stripped table-sm">
                        <thead>
                            <th>SN</th>
                            <th>ITEM</th>
                            <th>AMOUNT (#)</th>
                        </thead>
                        <tbody>
                        @foreach($workshop->workshopFees as $workshopFee)
                        
                        <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$workshopFee->fee->item}}</td>
                        <td>{{number_format($workshopFee->amount, 2)}}</td>
                        </tr>
                        @endforeach
                        <tr>
                        <td></td>
                        <td><b>Total</b></td>
                        <td><b>{{number_format($workshop->totalFees(),2)}}</b></td>
                        </tr>
                        </tbody>
                        
                    </table>
                    <button data-toggle="modal" data-target="#pay" class="btn btn-primary btn-sm">Proceed to Payment</button>
                </div>
            @include('Payment.pay')
            </div>
        </div>
    </div>

@endsection