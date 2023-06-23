<?php

namespace App\Policies;

use App\Models\User;
use App\Models\books;
use Illuminate\Auth\Access\HandlesAuthorization;

use Illuminate\Auth\Access\Response;

class BooksPolicy
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

    public function update(User $user, books $books)
    {
        // Only users with 'super_admin' or 'admin' roles can update categories
        return in_array($user->roles, ['super admin', 'admin']);
    }

    public function delete(User $user, books $books)
    {
        // Only users with 'super_admin' roles can delete categories
        return $user->roles === 'super admin';
    }
}
