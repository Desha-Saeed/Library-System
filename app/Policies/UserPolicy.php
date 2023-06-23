<?php

namespace App\Policies;

use App\Models\User;

use Illuminate\Auth\Access\HandlesAuthorization;

use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        // All users can view managers
        return $user->roles === 'super admin';
    }

    public function create(User $user)
    {
        // Only users with 'super_admin'  role can create managers
        return $user->roles === 'super admin';
    }

    public function update(User $user)
    {
        // Only users with 'super_admin'  roles can update managers
        return $user->roles === 'super admin';
    }

    public function delete(User $user)
    {
        // Only users with 'super_admin' roles can delete managers
        return $user->roles === 'super admin';
    }
}
