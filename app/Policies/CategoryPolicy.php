<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        // All users can view categories
        return true;
    }

    public function create(User $user)
    {
        // Only users with 'super_admin' or 'admin' role can create categories
        return in_array($user->roles, ['super admin', 'admin']);
    }

    public function update(User $user, Category $category)
    {
        // Only users with 'super_admin' or 'admin' role can update categories
        return in_array($user->roles, ['super admin', 'admin']);
    }

    public function delete(User $user, Category $category)
    {
        // Only users with 'super_admin' or 'admin' role can update categories
        return in_array($user->roles, ['super admin', 'admin']);
    }
}
