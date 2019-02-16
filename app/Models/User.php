<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * @var array
     */
    protected $appends = ['total_points'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['images'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /**
     * @return int
     */
    public function getTotalPointsAttribute()
    {
        $points = 0;
        $this->images->map(function ($image) use (&$points) {
            $points += $image->points;
        });

        return $points;
    }
}