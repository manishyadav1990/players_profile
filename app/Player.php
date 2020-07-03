<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'name', 'dob', 'profile', 'mobile','email', 'gender', 'playing_role',
        'batting_style','bowling_style','career_info'
    ];

}
