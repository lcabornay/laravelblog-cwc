<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    //
    protected $fillable = [
        'name',
        'update_user_id',
        'article_category_id',
    ];
}
