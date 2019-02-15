<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ScoreMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $media;

    public function __construct($user, $media)
    {
        $this->user = $user;
        $this->media = $media;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.instagram-score-mail');
    }
}
