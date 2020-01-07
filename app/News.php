<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = ['news_description', 'news_link', 'news_title'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
