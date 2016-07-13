<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GithubEvent extends Model
{
    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = ['id', 'type', 'actor_id', 'repo_id', 'public', 'org_id', 'created_at'];

    protected $dateFormat = DATE_ISO8601;

    protected $casts = [
        'created_at' => 'date',
        'public' => 'boolean'
    ];

    public function org()
    {
        return $this->belongsTo(Org::class);
    }

    public function repo()
    {
        return $this->belongsTo(Repo::class);
    }

    public function actor()
    {
        return $this->belongsTo(Actor::class);
    }
}
