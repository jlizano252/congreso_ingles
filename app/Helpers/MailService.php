<?php

namespace App\Helpers;

use App\Mail\ErrorEmail;
use App\Mail\MoodleUserDataEmail;
use App\Mail\RegisterMailNotification;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public static function sendRegisterMailNotification(array $params): void
    {
        static $delay = 0;

        $email = new RegisterMailNotification($params);

        Mail::to([$params['email']])
            ->bcc(['vetc@centroatenea.network'])
            ->later(now()->addSeconds($delay), $email);

        $delay += 10;
    }

    public static function sendExportMailNotification(array $params): void
    {
        static $delay = 0;

        $email = new MoodleUserDataEmail($params);

        Mail::to([$params['email']])
            ->bcc(['vetc@centroatenea.network'])
            ->later(now()->addSeconds($delay), $email);

        $delay += 10;
    }

    public static function sendErrorEmail($error): void
    {
        static $delay = 0;

        $email = new ErrorEmail($error);

        Mail::to('vetc@centroatenea.network')
            ->later(now()->addSeconds($delay), $email);

        $delay += 10;
    }
}
