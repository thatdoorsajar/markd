<?php

use Faker\Generator as Faker;

$factory->define(App\Mrkd\Bookmark::class, function (Faker $faker) {
    return [
        'url_given'    => $faker->url,
        'url_resolved' => $faker->url,
        'title'        => $faker->sentence,
        'description'  => $faker->paragraph(2),
        'image_url'    => $faker->imageUrl(1200, 1200),
        'content'      => $faker->paragraphs(3, true),
        'notes'        => $faker->paragraph(3),
        'domain_id'    => function () {
            return factory(App\Mrkd\Domain::class)->create()->id;
        },
        'folder_id'    => function () {
            return factory(App\Mrkd\Folder::class)->create()->id;
        },
        'user_id'      => function () {
            return factory(App\Accounts\User::class)->create()->id;
        },
        // 'mime_type'        => $faker->mimeType,
        // 'encoding'         => 'utf-8',
        // 'response_code'    => array_rand(['200', '404', '500']),
        // 'meta_title'       => $faker->sentence,
        // 'meta_description' => $faker->paragraph(2),
        // 'meta_image_url'   => $faker->imageUrl(1200, 1200),
        // 'lang'             => $faker->languageCode,
        // 'is_article'       => $faker->boolean(70),
        // 'has_image'        => $faker->boolean(40),
        // 'has_video'        => $faker->boolean(40),
        // 'is_dead'          => $faker->boolean(10),
        // 'is_https'         => $faker->boolean(90),
    ];
});
