@extends('layouts.app')
    @section('title')
        access control page
    @endsection
    @section('content')
    <div class="card-body shadow mb-4">
    <p class=""><b>Role and Permissions</b></p>
        <table class="table table-sm table-striped" style="color: black;">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th><button data-toggle="modal" data-target="#facilitator" class="btn btn-primary btn-sm"><b>+ Role</b></button></th>
                </tr>
            </thead>
            <tbody>
                @foreach(App\Models\Role::all() as $role)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$role->name}}</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-body shadow mb-4">
    <p class=""><b>Users Role</b></p>
        <table class="table table-sm table-striped" style="color: black;">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th><button data-toggle="modal" data-target="#facilitator" class="btn btn-primary btn-sm"><b>+ Role</b></button></th>
                </tr>
            </thead>
            <tbody>
                @foreach(App\Models\User::all() as $user)
                    @if($user->hasRoles())
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td></td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-body shadow mb-4">
    <p class=""><b>Users Permissions</b></p>
        <table class="table table-sm table-striped" style="color: black;">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Permissions</th>
                    <th><button data-toggle="modal" data-target="#facilitator" class="btn btn-primary btn-sm"><b>+ Role</b></button></th>
                </tr>
            </thead>
            <tbody>
                @foreach(App\Models\User::all() as $user)
                    @if($user->hasPermissions())
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endif    
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
