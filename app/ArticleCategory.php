<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    //
    protected $fillable = [
        'name',
        'update_user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'update_user_id');
    }
}
