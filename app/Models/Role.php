<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends BaseModel
{
    public function rolePermissions()
    {
        return $this->hasMany(RolePermission::class);
    }

    public function hasThisPermission($permission)
    {
        $flag = false;

        foreach($this->rolePermissions as $rolePermission){
            if($rolePermission->permission->id == $permission->id){
                $flag = true;
            }
        }

        return $flag;
    }
}
