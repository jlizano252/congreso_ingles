<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ErrorEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $error;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $error )
    {
        $this->error = $error;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.error-email-notification')
            ->subject( "Error Message")->with([ 'error' => $this->error ]);
    }
}
