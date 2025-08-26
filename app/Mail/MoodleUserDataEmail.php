<?php

namespace App\Mail;

use App\Helpers\MailService;
use App\Helpers\MoodleRequestService;
use App\Models\ExportedUser;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MoodleUserDataEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public array $params;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $params )
    {
        $this->params = $params;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.moodle-email-notification')
            ->subject( "V-ETC - Login details")
            ->with([ 'params' => $this->params ]);
    }
}
