<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Artist;

class ArtistController extends Controller
{
    public function list() {
        return view('artists.index', ['artists' => Artist::all()]);
    }

    public function save(Request $request, $id=null) {
        $validatedData = $request->validate(['artist_name' => 'required']);
        $artist_name = $validatedData['artist_name'];
        Artist::updateOrCreate(['id' => $id], ['artist_name' => $artist_name]);
        return redirect('artist');
    }
}
