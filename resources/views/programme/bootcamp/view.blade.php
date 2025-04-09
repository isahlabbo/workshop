@extends('layouts.app')

@section('title')
    {{strtolower($bootcamp->title)}}application
@endsection
@php 
    $programme= $bootcamp;
@endphp
@section('content')
    
    <div class="details">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
            <div class="card-body shadow mb-4">
                <h4 class="text text-primary text-center" style="color: white;" >{{$bootcamp->title}}</h4>
                <p class="text text-justify">{{$bootcamp->description}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="schedules">
    <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card-body shadow mb-4">
                    <h4 class="text text-primary text-center">Projects to be Covered</h4>
                   

                        @foreach($bootcamp->projects as $project)
                        <div class="card p-4 mb-4">
                        
                        <p class="text"><b>{{$project->name}}</b></p>
                        <p class="text text-justify">{{$project->description}}</p>
                        
                        <p class="text"><b>Curriculum</b></p>
                        <p>
                            <ol>
                                @foreach($project->steps as $step)
                                <li>{{$step->title}}</li>
                                @endforeach
                            </ol>
                        </p>

                        <p class="text"><b>Required Tools and Softwares</b></p>
                        <p>
                            <ul>
                                @foreach($project->tools as $tool)
                                <li>{{$tool->name}}</li>
                                @endforeach
                            </ul>
                        </p>
                        </div>
                        @endforeach
                        
                      
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
                        @foreach($bootcamp->bootcampFees as $bootcampFee)
                        
                        <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$bootcampFee->fee->item}}</td>
                        <td>{{number_format($bootcampFee->amount, 2)}}</td>
                        </tr>
                        @endforeach
                        <tr>
                        <td></td>
                        <td><b>Total</b></td>
                        <td><b>{{number_format($bootcamp->totalFees(),2)}}</b></td>
                        </tr>
                        </tbody>
                        
                    </table>
                    <button data-toggle="modal" data-target="#pay" class="btn btn-primary btn-sm">Proceed to Payment</button>
                </div>
               @include('payment.pay')
            </div>
        </div>
    </div>

@endsection