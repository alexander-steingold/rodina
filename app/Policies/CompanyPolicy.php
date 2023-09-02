<?php

namespace App\Policies;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CompanyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->company !== null;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Customer $company): bool
    {
        return $user->company !== null;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->company === null;
    }

    public function store(User $user): bool
    {
        return $user->company === null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Customer $company): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Customer $company): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Customer $company): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Customer $company): bool
    {
        return true;
    }
}
