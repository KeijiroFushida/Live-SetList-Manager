<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist_Event extends Model
{
    protected $fillabel = [
    	'event_id',
    	'artist_id'
    ];

    public function event() {
    	return $this->hasMany('App\Event');
    }

    public function artists() {
    	return $this->hasMany('App\Artist');
    }
}
