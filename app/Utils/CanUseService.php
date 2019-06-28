<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 20/06/2019
 * Time: 02:34 PM
 */

namespace App\Utils;

use App\Permission;

class CanUseService
{
    public static function isAuthorized(...$permission_titles): bool
    {
        $permissions = auth()->user()->role->permissions;
        //$permissions = Permission::all();

        foreach ($permission_titles as $title) {
            $flag = 0;
            foreach ($permissions as $permission) {
                if ($permission['title'] == $title) {
                    $flag = 1;
                }
            }
            if ($flag == 0) {
                return false;
            }
        }
        return true;
    }
}