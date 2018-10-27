<?php

use Faker\Generator as Faker;

$factory->define(App\Markd\Domain::class, function (Faker $faker) {
    return [
        'url_resolved'     => $faker->url,
        'mime_type'        => $faker->mimeType,
        'encoding'         => 'utf-8',
        'response_code'    => array_rand(['200', '404', '500']),
        'meta_title'       => $faker->sentence,
        'meta_description' => $faker->paragraph(2),
        'meta_image_url'   => $faker->imageUrl(1200, 1200),
        'lang'             => $faker->languageCode,
    ];
});
