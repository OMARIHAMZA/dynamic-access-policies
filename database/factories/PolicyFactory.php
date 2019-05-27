<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Policy;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Policy::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'description' => Str::random(),
        'creator_id' => rand(1, 2)
    ];
});
