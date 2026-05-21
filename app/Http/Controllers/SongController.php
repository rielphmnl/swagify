<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(Song::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'image' => ['required'],
            'song_file' => ['required'],
            'artist_id' => ['integer:strict'],
            'album_id' => ['integer:strict'],
        ]);

        $new_song = Song::create([
            'name' => request('name'),
            'image' => request('image'),
            'song_file' => request('song_file'),
            'artist_id' => request('artist_id'),
            'album_id' => request('album_id'),
        ]);

        return response($new_song);
    }

    /**
     * Display the specified resource.
     */
    public function show(Song $song)
    {
        return response($song);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Song $song)
    {
        $request->validate([
            'name' => ['required'],
            'image' => ['required'],
            'song_file' => ['required'],
            'artist_id' => ['integer:strict'],
            'album_id' => ['integer:strict'],
        ]);

        $song->update([
            'name' => request('name'),
            'image' => request('image'),
            'song_file' => request('song_file'),
            'artist_id' => request('artist_id'),
            'album_id' => request('album_id'),
        ]);

        return response($song);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        $song->delete();

        return response(Song::all());
    }
}
