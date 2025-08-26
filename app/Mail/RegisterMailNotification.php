<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMailNotification extends Mailable implements ShouldQueue
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
        $user = User::where('ide', $this->params['ide'])->first();

        return $this->view('mail.register-email-notification')
            ->subject( "¡Registro exitoso!")
            ->with([ 'params' => $this->params, 'user' => $user ]);
    }
}
