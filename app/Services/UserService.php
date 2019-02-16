<?php

namespace App\Services;

use App;
use App\Models\User;

/**
 * Class UserService
 *
 * @package App\Services
 */
class UserService
{
    public function getAll()
    {
        return User::all();
    }
}
