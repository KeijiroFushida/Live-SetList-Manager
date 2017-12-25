<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artists extends Model
{

	protected $fillable = [
		'artist_name'
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
