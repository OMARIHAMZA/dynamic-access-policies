<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Role;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->title,
        'description' => Str::random()
    ];
});
