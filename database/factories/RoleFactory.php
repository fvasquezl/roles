<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Caffeinated\Shinobi\Models\Role;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name'      => $role = $faker->word,
        'slug'      => Str::slug($role),
        'description'   => $faker->sentence,
        'special'   => Str::random('10')
    ];
});
