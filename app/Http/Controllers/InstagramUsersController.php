<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InstagramUser;

class InstagramUsersController extends Controller
{
    public function index()
    {
        return view('instagram-users.index', [
            'users' => InstagramUser::paginate(10),
        ]);
    }
}
