<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Purpose;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Purpose::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'purpose' => Str::random(),
        'action' => Purpose::asActionName(rand(0, 3)),
        'creator_id' => 1
    ];
});
