<?php

namespace App\Http\Controllers\Access;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

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

    public function updatePermission(Request $request, $roleId)
    {
        $role = Role::find($roleId);
        foreach($role->rolePermissions as $rolePermission){
            if(!$this->requestHasThisPermission($rolePermission, $request->permission)){
                $rolePermission->delete();
            }
        }

        foreach($request->permission as $permission=>$permission_id){
            $role->rolePermissions()->firstOrCreate(['permission_id'=>$permission_id]);
        }
        
        return redirect()->route('access.index')->withToastSuccess('Role Permissions Updated');

    }

    public function updateUserRole(Request $request, $userId)
    {
        $user = User::find($userId);
        foreach($user->userRoles as $userRole){
            if(!$this->requestHasThisUserRole($userRole, $request->role)){
                $userRole->delete();
            }
        }

        foreach($request->role as $role=>$role_id){
            $user->userRoles()->firstOrCreate(['role_id'=>$role_id]);
        }
        
        return redirect()->route('access.index')->withToastSuccess('User Roles Updated');

    }

    public function requestHasThisUserRole($userRole, $roles)
    {
        $status = false;

        foreach($roles as $role=>$role_id){
            if($userRole->role->id == $role_id){
                $status = true;
            }
        }
        return $status; 
    }

    public function requestHasThisPermission($rolePermission, $permissions)
    {
        $status = false;

        foreach($permissions as $permission=>$permission_id){
            if($rolePermission->permission->id == $permission_id){
                $status = true;
            }
        }
        return $status; 
    }

    public function delete($roleId)
    {
        $role = Role::find($roleId);
        $role->delete();
        return redirect()->route('access.index')->withToastSuccess('Role Deleted');
    }
}
