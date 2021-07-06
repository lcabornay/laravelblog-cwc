<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article as Article;
use App\User as User;
use App\ArticleCategory as ArticleCategory;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'update_user_id' => factory(User::class),
        'title' => $faker->sentence(),
        'slug' => $faker->sentence(),
        'contents' => $faker->paragraph(),
        'image_path' => $faker->image('public/storage/images',640,480, null, false),
        'article_category_id' => factory(ArticleCategory::class)
    ];
});
