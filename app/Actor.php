<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    public $timestamps = false;

    protected $fillable = ['id', 'login', 'display_login', 'gravatar_id', 'url', 'avatar_url'];
}
