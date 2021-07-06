<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ArticleCategory as ArticleCategory;
use Faker\Generator as Faker;
use App\User as User;

$factory->define(ArticleCategory::class, function (Faker $faker) {
    return [
        'update_user_id' => factory(User::class),
        'name' => $faker->name()
    ];
});
