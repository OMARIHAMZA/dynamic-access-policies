<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 28/06/2019
 * Time: 10:56 PM
 */

namespace App;


class Notification
{
    public $action;
    public $description;

    public function __construct($description, $action)
    {
        $this->description = $description;
        $this->action = $action;
    }
}