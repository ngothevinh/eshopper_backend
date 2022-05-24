<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {

    }


    public function view(User $user)
    {
        return $user->checkPermissionAccess('product_list');
    }


    public function create(User $user)
    {
        return $user->checkPermissionAccess('product_add');
    }


    public function edit(User $user)
    {
        return $user->checkPermissionAccess('product_edit');
    }


    public function delete(User $user)
    {
        return $user->checkPermissionAccess('product_delete');
    }

    public function restore(User $user, Product $product)
    {

    }


    public function forceDelete(User $user, Product $product)
    {

    }
}
