<?php

use Faker\Generator as Faker;

$factory->define(App\Markd\Domain::class, function (Faker $faker) {
    return [
        'url_resolved'  => $faker->url,
        'response_code' => array_rand(['200', '404', '500']),
        'title'         => $faker->sentence,
        'description'   => $faker->paragraph(2),
        'image_url'     => $faker->imageUrl(1200, 1200),
    ];
});
