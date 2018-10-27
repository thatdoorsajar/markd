<?php

use Faker\Generator as Faker;

$factory->define(App\Markd\Bookmark::class, function (Faker $faker) {
    return [
        'url'              => $faker->url,
        'meta_title'       => $faker->sentence,
        'meta_description' => $faker->paragraph(2),
        'meta_image'       => $faker->imageUrl(1200, 1200),
        'title'            => $faker->sentence,
        'description'      => $faker->paragraph(2),
        'content'          => $faker->paragraphs(3, true),
        'notes'            => $faker->paragraph(3),
        'is_dead'          => $faker->boolean(10),
        'is_https'         => $faker->boolean(90),
        'folder_id'        => rand(1, 10),
        'user_id'          => rand(1, 5),
    ];
});
