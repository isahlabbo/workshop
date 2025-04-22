@extends('layouts.app')
    @section('title')
        access control page
    @endsection
    @section('content')
    <div class="card-body shadow mb-4">
        <p class=""><b>Role</b></p>
        <table class="table table-sm table-striped" style="color: black;" id="myTable">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Role</th>
                    <th><button data-toggle="modal" data-target="#newRole" class="btn btn-sm btn-outline-primary btn-sm"><b><i class="fas fa-pen"> Role</i></b></button></th>
                </tr>
            </thead>
            <tbody>
                @foreach(App\Models\Role::all() as $role)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$role->name}}</td>
                        <td>
                        <a href="#" data-toggle="modal" data-target="#edit_role_{{$role->id}}" class="btn btn-sm btn-outline-info"><i class="fas fa-eye"></i> Edit</a>
                        <a href="{{route('access.role.delete',[$role->id])}}" onclick="return confirm('Are sure, you want to delete this role?')" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                @include('access.role.edit')    
                @endforeach
            </tbody>
        </table>
        @include('access.role.create')
    </div>

    <div class="card-body shadow mb-4">
        <p class=""><b>Permissions</b></p>
        <table class="table table-sm table-striped" style="color: black;">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Permission</th>
                    <th><button data-toggle="modal" data-target="#newPermission" class="btn btn-sm btn-outline-primary btn-sm"><b><i class="fas fa-pen"></i> Permission</b></button></th>
                </tr>
            </thead>
            @include('access.permission.create')
            <tbody>
                @foreach(App\Models\Permission::all() as $permission)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$permission->name}}</td>
                        <td>
                        <button data-toggle="modal" data-target="#edit_permission_{{$permission->id}}" class="btn btn-sm btn-outline-info btn-sm"><b><i class="fas fa-eye"></i> Edit</b></button>
                        <a href="{{route('access.permission.delete',[$permission->id])}}" onclick="return confirm('Are sure, you want to delete this permission?')" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    @include('access.permission.edit')
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-body shadow mb-4">
    <p class=""><b>Role Permissions</b></p>
        <table class="table table-sm table-striped" style="color: black;">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach(App\Models\Role::all() as $role)
                <form action="{{route('access.role.updatePermission',[$role->id])}}" method="post">
                    @csrf
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$role->name}}</td>
                        <td>
                        <div class="row">
                            @foreach(App\Models\Permission::all() as $permission)
                            <div class="col-md-3">
                            @if($role->hasThisPermission($permission))
                            {{$permission->name}} : <input type="checkbox" name="permission[]" checked value="{{$permission->id}}">
                            @else
                            {{$permission->name}} : <input type="checkbox" name="permission[]" value="{{$permission->id}}">
                            @endif
                            </div>
                            @endforeach
                        </div>
                        </td>
                        <td><button class="btn btn-sm btn-outline-primary">Update</button></td>
                    </tr>
                </form>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-body shadow mb-4">
    <p class=""><b>User Roles</b></p>
        <table class="table table-sm table-striped" style="color: black;">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Roles</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach(App\Models\User::all() as $user)
                <form action="{{route('access.role.updateUserRole',[$user->id])}}" method="post">
                @csrf
                    <tr>    
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                        <div class="row">
                            @foreach(App\Models\Role::all() as $role)
                            <div class="col-md-3">
                            @if($user->hasThisRole($role))
                                {{$role->name}} : <input type="checkbox" checked name="role[]" value="{{$role->id}}">
                            @else
                                {{$role->name}} : <input type="checkbox" name="role[]" value="{{$role->id}}">
                            @endif
                            </div>
                            @endforeach
                        </div>
                        </td>
                        <td><button class="btn btn-sm btn-outline-primary">Update</button></td>
                    </tr>
                    </form>
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
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach(App\Models\User::all() as $user)
            <form action="{{route('access.role.updateUserPermission',[$user->id])}}" method="post">
            @csrf
                <tr>    
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                    <div class="row">
                        @foreach(App\Models\Permission::all() as $permission)
                        <div class="col-md-3">
                        @if($user->canDo($permission))
                            {{$permission->name}} : <input type="checkbox" checked name="permission[]" value="{{$permission->id}}">
                        @else
                            {{$permission->name}} : <input type="checkbox" name="permission[]" value="{{$permission->id}}">
                        @endif
                        </div>
                        @endforeach
                    </div>
                    </td>
                    <td><button class="btn btn-sm btn-outline-primary">Update</button></td>
                </tr>
                </form>
            @endforeach
            </tbody>
        </table>
    </div>
    @endsection
