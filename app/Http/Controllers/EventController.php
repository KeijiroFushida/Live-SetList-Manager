<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;

class EventController extends Controller
{
    public function index(){
    	echo 'Hello World';
    }

    public function getEventDetail($event_id)
    {
        $event = Event::findOrFail($event_id);
        return view('events.detail', ['event' => $event]);
    }
}
