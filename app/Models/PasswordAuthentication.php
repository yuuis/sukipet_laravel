<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordAuthentication extends Model
{
    protected $fillable = array("password_digest","user_id");
}
