<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InstagramUser;
use App\InstagramUserMedia;

class InstagramUserImagesController extends Controller
{
    public function show($userName, $mediaId)
    {
        $user = InstagramUser::where('user_name', $userName)
        ->firstOrFail();

        $media = InstagramUserMedia::findOrFail($mediaId);

        return view('instagram-user-media.show', [
            'user' => $user,
            'media' => $media,
        ]);
    }
}
