<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GithubEvent extends Model
{
    public $incrementing = false;

    protected $fillable = ['id', 'type', 'actor', 'repo', 'repo_url', 'created_at'];
}
