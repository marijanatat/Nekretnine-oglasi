<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Flyer;
use Faker\Generator as Faker;

$factory->define(Flyer::class, function (Faker $faker) {
    return [
        'street' => $faker->streetAddress,
        'city' => $faker->city,
        'zip' => $faker->postcode,
        'state' => $faker->state,
        'street' => $faker->streetAddress,
        'price' => $faker->number_format(22000,500000),
        'description' => $faker->paragraphs(3),
    ];
});
