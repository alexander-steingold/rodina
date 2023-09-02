<?php

namespace App\Policies;

use App\Models\User;

class ReportPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

//    public function is_admin(User $user): bool
//    {
//        logger('info', [$user]);
//        // return $user->role === 'admin';
//        return false;
//    }
}
