<?php

namespace App\Helpers;

use App\Models\RegistrationForm;
use App\Models\User;

class FormatService
{
    public static function getUniqueConsecutiveCode(): int|string
    {
        $rows_count = RegistrationForm::where('reference', 'LIKE', date('y') . '%')->count();
        $consecutive = date('y') . ++$rows_count + 100000;

        if( is_null( RegistrationForm::where( 'reference', '=', $consecutive )->first() ) ){
            return $consecutive;
        }

        do{
            $consecutive++;
        }while( !is_null( RegistrationForm::where( 'reference', '=', $consecutive )->first() ));

        return $consecutive;
    }

    public static function formatPhoneNumber( $phone_number ): array|string
    {
        $phone = substr( preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '', str_replace('-', '', trim($phone_number)) )), -8 );
        return substr_replace($phone, '-', 4, 0);
    }

    public static function getRandomUserPassword():string {
        $chars = array(
            'lower_chars' => 'bcdfghjklmnpqrstvwxyz',
            'digits' => '123467890',
            'upper_chars' => 'BCDFGHJKLMNPQRSTVWXYZ',
            'special_chars' => '*@'
        );
        $count = 0;
        $password = array();

        for( $i=0; $i < 2; $i++ ) {
            foreach ( $chars as $char_group ) {
                $position = rand(0,(strlen($char_group)-1));
                $char = $char_group[$position];
                if($char!="") {
                    $password[] = $char;
                }
            }
        }
        // shuffle($password);
        return '@'.implode($password);
    }

}
