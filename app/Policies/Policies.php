<?php

namespace App\Policies;

use App\User;
use App\Utils\CanUseService;
use Illuminate\Auth\Access\HandlesAuthorization;

class Policies
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view()
    {
        return CanUseService::isAuthorized('can_viewPolicies');
    }
}
