<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue; // ← IMPORTANTE
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ParticipantTopicsMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $participant;
    public $sessions;

    public function __construct($participant, $sessions)
    {
        $this->participant = $participant;
        $this->sessions = $sessions;
    }

    public function build()
    {
        return $this->subject('Your Registered Sessions - V-ETC 2025')
            ->view('mail.participant-topics');
    }
}
