<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ParticipantTopicsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $participant;
    public $topics;

    public function __construct($participant, $topics)
    {
        $this->participant = $participant;
        $this->topics = $topics;
    }

    public function build()
    {
        return $this->subject('Your Selected Topics')
            ->view('mail.participant-topics');
    }
}
