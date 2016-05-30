<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    public $increments = false;

    public $timestamps = false;

    protected $fillable = ['text', 'created_at'];

    protected $dates = ['created_at'];
}
