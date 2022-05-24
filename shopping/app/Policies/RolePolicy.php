<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user)
    {
        return $user->checkPermissionAccess('role_list');
    }


    public function create(User $user)
    {
        return $user->checkPermissionAccess('role_add');
    }


    public function edit(User $user)
    {
        return $user->checkPermissionAccess('role_edit');
    }


    public function delete(User $user)
    {
        return $user->checkPermissionAccess('role_delete');
    }


    public function restore(User $user)
    {
        //
    }


    public function forceDelete(User $user)
    {
        //
    }
}
