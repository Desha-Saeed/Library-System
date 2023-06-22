<?php

namespace App\Policies;

use App\Models\User;
use App\Models\books;
use Illuminate\Auth\Access\Response;

class BooksPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {

        return true;
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    // public function view(User $user, books $books): bool
    public function view(User $user): bool
    {
        return $user->roles=='admin';

        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->roles=='admin';
        
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, books $books): bool
    {
        //
        return $user->roles=='admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, books $books): bool
    {

        return $user->roles=='admin';
        //
    }


    public function restore(User $user, books $books): bool
    {
        return true;
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, books $books): bool
    {
        //
        return true;

    }
}
