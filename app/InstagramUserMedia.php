<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstagramUserMedia extends Model
{
    protected $fillable = [
        'instagram_id',
        'user_id',
        'media_url',
        'image',
        'likes',
        'comments',
    ];
}
