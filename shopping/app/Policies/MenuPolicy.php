<?php

namespace App\Policies;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MenuPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }


    public function view(User $user)
    {
        return $user->checkPermissionAccess('menu_list');
    }


    public function create(User $user)
    {
        return $user->checkPermissionAccess('menu_add');
    }


    public function edit(User $user)
    {
        return $user->checkPermissionAccess('menu_edit');
    }


    public function delete(User $user)
    {
        return $user->checkPermissionAccess('menu_delete');
    }


    public function restore(User $user, Menu $menu)
    {

    }


    public function forceDelete(User $user, Menu $menu)
    {

    }
}
