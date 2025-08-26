<?php

namespace App\Helpers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class MoodleRequestService
{
    public string $token;
    public string $host;

    function __construct() {
        $this->token = '79e01dccfdf4c153af8b7417376f7f85'; // Prod
        $this->host = 'https://cms.centroatenea.app/ui/webservice/rest/server.php'; // Prod
//        $this->token = '15b2013dc037f052c38e091676c277a1'; // Testing
//        $this->host = 'http://pruebas.gilberthrojas.com/moodle/webservice/rest/server.php'; // Testing
    }

    public function createMoodleUser( User $user ) {
        try {
            $function = "core_user_create_users";
            //
            $username = str_replace(' ', '', trim($user->ide));
            $firstname = ucfirst(strtolower(trim($user->name)));
            $lastname = ucfirst(strtolower(trim($user->lastname1))) . ' ' . ucfirst(strtolower(trim($user->lastname2)));
            $email = strtolower(trim($user->email));
            $password = FormatService::getRandomUserPassword();
            $country = 'CR';
            $url = $this->host . '?wstoken='. $this->token . '&wsfunction='
                . $function . '&users[0][username]='. $username . '&users[0][password]='
                . $password . '&users[0][firstname]='. $firstname . '&users[0][lastname]='
                . $lastname . '&users[0][email]='. $email . '&users[0][country]='
                . $country . '&moodlewsrestformat=json';

            $response = Http::post($url);

            if($response->serverError() || $response->clientError()) {
                return null;
            }

            if($response->successful()) {
                $collect = $response->collect();
                if( isset( $collect[0]['id'] ) && $collect[0]['id'] > 0 ){
                    $this->enrollUserToGroupList( (string)$collect[0]['id'] );
                    $params = array(
                        'username' => $username,
                        'name' => $firstname .' '. $lastname,
                        'password' => $password,
                        'email' => $email
                    );
                    MailService::sendExportMailNotification($params);
                    return $collect[0]['id'];
                }
                if( isset( $collect[0]['exception'] ) && $collect[0]['exception'] != "" ){
                    $error = array(
                        $collect[0]['exception'],
                        $url
                    );
                    MailService::sendErrorEmail( $error );
                }
                MailService::sendErrorEmail( $url );
                // dd($response->collect() . ' - ' . $url);
                return null;
            }
        }catch( \Exception $exception ){
            MailService::sendErrorEmail($exception);
        }
        return null;
    }

    public function enrollUserToCourse( string $user_id, string $course_id ): ?bool
    {
        try {
            $function = "enrol_manual_enrol_users";
            $enroll_date = self::getCurrentUnixDate();
            $rol_id = 5;
            $url = $this->host . '?wstoken='. $this->token . '&wsfunction=' . $function .
                '&enrolments[0][roleid]=' . $rol_id . '&enrolments[0][userid]=' . $user_id .
                '&enrolments[0][courseid]=' . $course_id . '&enrolments[0][timestart]=' . $enroll_date .
                '&moodlewsrestformat=json';
            $response = Http::post( $url );

            if( empty($response->collect()->toArray()) ) {
                return true;
            }
        }catch( \Exception $exception ){
            MailService::sendErrorEmail($exception);
        }
        return null;
    }

    public function getCurrentUnixDate(): string {
        return Carbon::now()->timestamp;
    }

    public function enrollUserToGroupList( string $user_id ): void
    {
        $course_list = [3,4,5,6,7];
        foreach ( $course_list as $course ) {
            $this->enrollUserToCourse($user_id,$course);
        }
    }
}
