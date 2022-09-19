<?php

namespace App\Traits;

use App\Models\Permission;

trait HasPermissionsTrait 
{

    public function givePermissionsTo(...$permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        dd($permissions);
        if($permissions===null)
        {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }

    protected function hasPermissions($permission)
    {
        return (bool) $this->permissions->where('slug', $permission->slug)->count();
    }

    public function getAllPermissions(array $permissions)
    {
        return Permission::whereIn('slug', $permissions)->get();
    }

}