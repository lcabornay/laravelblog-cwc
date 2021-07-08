<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'contents',
        'article_category_id',
        'update_user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'update_user_id');
    }

    public function article_category()
    {
        return $this->belongsTo(ArticleCategory::class, 'article_category_id');
    }
}
