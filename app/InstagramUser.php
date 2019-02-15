<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstagramUser extends Model
{
    protected $fillable = [
        'instagram_id',
        'user_name',
        'full_name',
        'profile_pic_url',
    ];
}
