<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    public $timestamps = false;

    public $fillable = [
        'role_id', 'permission_id'
    ];

    public $role_id;
    public $permission_id;

    public function role()
    {
        return Role::find($this->role_id);
    }

    public function permission()
    {
        return Permission::find($this->permission_id);
    }
}
