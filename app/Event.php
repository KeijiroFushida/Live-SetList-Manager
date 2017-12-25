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
		return $this->hasMany('App\Music');
	}

	public function events() {
		return $this->belongsToMany('App\Event');
	}

	public function artist_event() {
		return $this->belongsTo('App\Artist_Event');
	}
}
