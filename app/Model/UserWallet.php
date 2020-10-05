<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserWallet extends Model
{
   protected $fillable = ['user_id', 'amount'];
}
