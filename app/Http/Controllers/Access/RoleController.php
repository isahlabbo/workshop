<?php

namespace App\Http\Controllers\Access;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function register(Request $request)
    {
        $request->validate(['name'=>'required|unique:roles']);
        Role::create(['name'=>$request->name]);
        return redirect()->route('access.index')->withToastSuccess('Role Registered');
    }

    public function update(Request $request, $roleId)
    {
        $request->validate(['name'=>'required']);
        $role = Role::find($roleId);
        $role->update(['name'=>$request->name]);
        return redirect()->route('access.index')->withToastSuccess('Role Updated');
    }
}
