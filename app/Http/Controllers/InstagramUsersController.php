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

    public function show($userName)
    {
        $user = InstagramUser::where('user_name', $userName)
        ->with('medias')
        ->firstOrFail();
        
        return view('instagram-users.show', [
            'user' => $user
        ]);
    }
}
