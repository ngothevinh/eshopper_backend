<?php

namespace App\Policies;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user)
    {
        return $user->checkPermissionAccess('setting_list');
    }


    public function create(User $user)
    {
        return $user->checkPermissionAccess('setting_add');
    }

    public function edit(User $user)
    {
        return $user->checkPermissionAccess('setting_edit');
    }


    public function delete(User $user)
    {
        return $user->checkPermissionAccess('setting_delete');
    }

    public function restore(User $user, Setting $setting)
    {
        //
    }

    public function forceDelete(User $user, Setting $setting)
    {
        //
    }
}
