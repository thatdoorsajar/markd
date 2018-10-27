<?php

use Faker\Generator as Faker;

$factory->define(App\Markd\Folder::class, function (Faker $faker) {
    return [
        'slug'        => $faker->unique()->slug,
        'title'       => $faker->sentence,
        'description' => $faker->paragraph(2),
        'notes'       => $faker->paragraph(3),
        'is_archived' => $faker->boolean(10),
        'user_id'     => rand(1, 5),
    ];
});
