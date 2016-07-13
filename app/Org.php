<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Org extends Model
{
    public $timestamps = false;

    protected $fillable = ['id', 'login', 'gravatar_id', 'url', 'avatar_url'];
}
