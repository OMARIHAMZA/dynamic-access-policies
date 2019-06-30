<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 29/06/2019
 * Time: 10:36 PM
 */

namespace App\Utils;


class JSON
{
    public static function encode($object, $json_attributes)
    {
        foreach ($json_attributes as $attribute) {
            $object[$attribute] = json_decode($object[$attribute]);
        }

        $json = json_encode($object);

        return $json;
    }
}