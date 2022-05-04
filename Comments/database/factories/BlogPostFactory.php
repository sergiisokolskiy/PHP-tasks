<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $this->faker->sentence(rand(3, 8),true);
    $txt = $this->faker->realText(rand(1000, 4000));
    $isPublished = rand(1, 5) >1;

    $createdAt = $this->faker->dateTimeBetween('-3 months', '-2 days');

    $data = [
        //'category_id'  => rand(1, 11),
        'author_id'  => (rand(1, 5) == 5) ? 1 : 2,
        'title'  => $title,
        'slug'  =>  Str::slug($title),
       // 'excerpt'  => $this->faker->text(rand(400, 1000)),
        'content_raw' => $txt,
        //'content_html' =>$txt,
        'is_published'  => $isPublished,
        'published_at' => $isPublished ? $this->faker->dateTimeBetween('-2 months', '-1 days') : null,
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];

    return $data;
});
