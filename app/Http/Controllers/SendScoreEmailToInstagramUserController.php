<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SendScoreEmailRequest;
use App\Mail\ScoreMail;
use App\InstagramUser;
use App\InstagramUserMedia;
use Illuminate\Support\Facades\Mail;

class SendScoreEmailToInstagramUserController extends Controller
{
    public function store(SendScoreEmailRequest $request, $userName, $mediaId)
    {
        $user = InstagramUser::where('user_name', $userName)
        ->firstOrFail();

        $media = InstagramUserMedia::findOrFail($mediaId);

        Mail::to($request->email)->send(new ScoreMail($user, $media));

        return redirect()->route('instagram-users.index');
    }
}
