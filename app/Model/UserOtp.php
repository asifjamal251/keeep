<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserOtp extends Model
{
    protected $fillable = [
        'email','otp'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
}