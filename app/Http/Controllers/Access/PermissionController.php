<?php

namespace App\Http\Controllers\Access;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function register(Request $request)
    {
        $request->validate(['name'=>'required|unique:permissions']);
        Permission::create(['name'=>$request->name]);
        return redirect()->route('access.index')->withToastSuccess('Permission Registered');
    }

    public function update(Request $request, $permissionId)
    {
        $request->validate(['name'=>'required']);
        $permission = Permission::find($permissionId);
        $permission->update(['name'=>$request->name]);
        return redirect()->route('access.index')->withToastSuccess('Permission Updated');
    }
}
