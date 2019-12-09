<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['id', 'content', 'teaser', 'headline', 'author_id'];
}
