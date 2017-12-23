<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
	protected $fillable = [
		'event_name',
		'event_place',
		'event_date'
	];
	public function musics() {
		return $this->hasMany('App\Musics');
	}

	public function artist_event() {
		return $this->belongsTo('App\Artist_Event');
	}
}
