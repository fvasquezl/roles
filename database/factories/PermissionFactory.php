<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Caffeinated\Shinobi\Models\Permission;
use Faker\Generator as Faker;

$factory->define(Permission::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'slug' => $faker->word,
        'description' => $faker->sentence,
    ];
});
