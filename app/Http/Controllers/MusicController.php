<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function save(Request $request, $id=null)
    {
        $validatedData = $request->validate([
            'event_id' => 'required|integer',
            'order' => 'bail|required|integer',
            'music_name' => 'required',
            'artist_id' => 'required|integer',
        ]);
        Music::updateOrCreate(['id' => $id], $validatedData);
        return redirect('event/'.$validatedData['event_id']);
    }

    
}
