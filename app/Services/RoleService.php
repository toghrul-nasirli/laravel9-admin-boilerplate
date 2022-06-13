<?php

namespace App\Services;

use App\Models\Role;

class RoleService extends BaseService
{
    public static function all()
    {
        return Role::all();
    }
}
