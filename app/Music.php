<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Musics extends Model
{
	protected $fillable = [
		'event_id',
		'order',
		'artist_id',
		'music_name'
	];
    public function event() {
    	return $this->belongsTo('App\Event');
    }
    public function artist() {
    	return $this->belongsTo('App\Artist');
    }
}
