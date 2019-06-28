<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 28/06/2019
 * Time: 10:16 PM
 */

namespace App;


class Work
{
    public $href;
    public $description;

    public function __construct($description, $href)
    {
        $this->description = $description;
        $this->href = $href;
    }
}