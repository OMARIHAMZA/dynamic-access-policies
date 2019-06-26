<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 20/06/2019
 * Time: 02:34 PM
 */

namespace App\Utils;

class Navigations
{
    public static function getNavigations()
    {
        $navigations = [];

        if (CanUseService::isAuthorized('can_viewDashboard')) {
            array_push($navigations, 'dashboard');
        }

        if (CanUseService::isAuthorized('can_viewUsers')) {
            array_push($navigations, 'users');
        }

        if (CanUseService::isAuthorized('can_viewRoles')) {
            array_push($navigations, 'roles');
        }

        if (CanUseService::isAuthorized('can_viewPermissions')) {
            array_push($navigations, 'permissions');
        }

        if (CanUseService::isAuthorized('can_viewPolicies')) {
            array_push($navigations, 'policies');
        }

        if (CanUseService::isAuthorized('can_viewHistory')){
            array_push($navigations, 'history');
        }

        return $navigations;
    }
}