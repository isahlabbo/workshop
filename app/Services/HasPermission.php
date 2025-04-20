<?php
namespace App\Services;


trait HasOnlinePayment{

    public function can($permission)
    {
        $status = false;
        foreach($this->userRoles as $userRole){
            foreach($userRole->role->rolePermissions as $rolePermission){
                if($rolePermission->status == 'active'){
                    $status = true;
                }
            }
        }

        foreach($this->userPermissions as $userPermission){
            if($userPermission->status == 'active'){
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
    