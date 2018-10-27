<?php

use Faker\Generator as Faker;

$factory->define(App\Markd\Folder::class, function (Faker $faker) {
    return [
        'slug'        => $faker->unique()->slug,
        'title'       => $faker->sentence(3),
        'description' => $faker->paragraph(2),
        'notes'       => $faker->paragraph(3),
        'is_archived' => $faker->boolean(10),
        'top_folder'  => false,
        'user_id'     => function () {
            return factory(App\Accounts\User::class)->create()->id;
        }
    ];
});
