@extends('layouts.app')
    @section('title')
        available coupons
    @endsection
    @section('content')
    <table class="table table-sm table-striped" style="color: black;" id="myTable">
        <thead>
            <tr>
                <th>S/N</th>
                <th>CODE</th>
                <th>PERCENTAGE OFF</th>
                <th>STATUS</th>
                <th><button data-toggle="modal" data-target="#coupon" class="btn btn-primary btn-sm"><b>+ coupon</b></button></th>
            </tr>
            @include('coupon.create')
        </thead>
        <tbody>
            @foreach(App\Models\Coupon::all() as $coupon)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$coupon->code}}</td>
                    <td>{{$coupon->percentage}} %</td>
                    <td>{{$coupon->status}}</td>
                    <td>
                        <button class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#edit_{{$coupon->id}}">Edit</button>
                        <a href="{{route('coupon.delete',[$coupon->id])}}" onclick="return confirm('Are you sure, you want to delete this coupon?')"><button class="btn btn-outline-danger btn-sm">Delete</button></a>
                    </td>
                    @include('coupon.edit')
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
