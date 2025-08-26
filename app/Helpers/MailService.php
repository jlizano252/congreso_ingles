<?php

namespace App\Helpers;

use App\Mail\ErrorEmail;
use App\Mail\MoodleUserDataEmail;
use App\Mail\RegisterMailNotification;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public static function sendRegisterMailNotification( array $params ): void
    {
        $email = New RegisterMailNotification( $params );
        Mail::to([$params['email']])->bcc(['ivetc@aulavirtual.co.cr'])->send($email);
    }

    public static function sendExportMailNotification( array $params ): void
    {
        $email = New MoodleUserDataEmail( $params );
        Mail::to([$params['email']])->bcc(['ivetc@aulavirtual.co.cr'])->send($email);
    }

    public static function sendErrorEmail( $error ): void
    {
        $email = New ErrorEmail( $error );
        Mail::to('andres.rojas.alfaro@gmail.com')->send($email);
    }
}
