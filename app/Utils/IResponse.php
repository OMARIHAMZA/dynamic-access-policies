<?php
/**
 * Created by PhpStorm.
 * User: Nazeer Allahham
 * Date: 27/06/2019
 * Time: 03:46 PM
 */

namespace App\Utils;

class IResponse
{
    public static function make($type, $data)
    {
        switch ($type) {
            case 'JSON':
                return IResponse::json($data);
        }
    }

    public static function json($data)
    {
        response()->json($data);
    }
}