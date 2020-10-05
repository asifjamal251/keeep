<?php
namespace App\Transformers;
class Json
{
    public static function response($data = null, $message = null)
    {
        return [
        	'error' => false,
            'data'    => $data,
            'message' => $message?$message:'OTP has been sent on your registered email address.',
        ];
    }
}