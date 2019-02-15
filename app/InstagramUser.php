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

    public function medias()
    {
        return $this->hasMany(InstagramUserMedia::class, 'user_id');
    }

    public function getScoreAttribute()
    {
        return $this->medias->sum(function ($media) {
            return $media->likes + ($media->comments * 5);
        });
    }
}
