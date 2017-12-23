<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artists extends Model
{

	protected $fillable = [
		'artist_name'
	];

    public function musics() {
    	return $this->hasMany('App\Musics');
    }

    public function artist_event() {
    	return $this->belongsTo('App\Artist_Event');
    }
}
