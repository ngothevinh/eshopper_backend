<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user)
    {
        return $user->checkPermissionAccess('user_list');
    }


    public function create(User $user)
    {
        return $user->checkPermissionAccess('user_add');
    }


    public function edit(User $user)
    {
        return $user->checkPermissionAccess('user_edit');
    }


    public function delete(User $user)
    {
        return $user->checkPermissionAccess('user_delete');
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
