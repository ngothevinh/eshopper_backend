<?php

namespace App\Policies;

use App\Models\Slider;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SliderPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
    }


    public function view(User $user)
    {
        return $user->checkPermissionAccess('slider_list');
    }


    public function create(User $user)
    {
        return $user->checkPermissionAccess('slider_add');
    }


    public function edit(User $user)
    {
        return $user->checkPermissionAccess('slider_edit');
    }


    public function delete(User $user)
    {
        return $user->checkPermissionAccess('slider_delete');
    }


    public function restore(User $user, Slider $slider)
    {
        //
    }


    public function forceDelete(User $user, Slider $slider)
    {
        //
    }
}
