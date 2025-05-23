<?php
namespace App\Services;


trait HasPermission{

    public function hasRoles()
    {
        if(count($this->userRoles) > 0){
            return true;
        }

        return false;
    }

    public function hasPermissions()
    {
        if(count($this->userPermissions) > 0){
            return true;
        }

        return false;
    }

    public function hasThisRole($role)
    {
        $status = false;

        foreach($this->userRoles as $userRole){
            if($userRole->role->id == $role->id){
                $status = true;
            }
        }

        return $status;
    }

    public function hasThisPermission($permission)
    {
        $status = false;

        foreach($this->userPermissions as $userPermission){
            if($userPermission->permission->id == $permission->id){
                $status = true;
            }
        }

        return $status;
    }
    
    public function canDo($permission)
    {
        $status = false;
        foreach($this->userRoles as $userRole){
            foreach($userRole->role->rolePermissions as $rolePermission){
                if($rolePermission->permission->id == $permission->id){
                    $status = true;
                }
            }
        }

        foreach($this->userPermissions as $userPermission){
            if($userPermission->permission->id == $permission->id){
                $status = true;
            }
        }

        return $status;
    }

    public function hasRoleof()
    {
        foreach($this->userRoles as $userRole){
            if($userRole->status == 'active' && $userRole->role->name == $role){
                return true;
            }
        }
        return false;
    }

    public function revokeRoleof($role)
    {
        
    }

    public function revokePermissionTo($permission)
    {
        # code...
    }
}
    