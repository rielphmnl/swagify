<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = new Song;

        if ($request->input('search')) {
            $query = $query->where('name', 'LIKE', '%' . $request->input('search') . '%');
        }

        
        $songs = $query->get();

        return response($songs);
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
            'name' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:5120'],
            'song_file' => ['required'], // how? text for now
            'artist_id' => ['integer:strict', 'exists:artists,id'], // check if exists rule 
            'album_id' => ['integer:strict', 'exists:albums,id'], // optional 
        ]);

        // initialized default image
        $imagePath = Storage::url('dafault_song.png');

        if ($request->image) {
            $imagePath = Storage::url($request->image->store('song_image', 'public'));  
        }


        $new_song = Song::create([
            'name' => request('name'),
            'image' => $imagePath,
            'song_file' => request('song_file'), // text for now
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
            'name' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:5120'],
            'song_file' => ['nullable'],
            'artist_id' => ['nullable', 'integer:strict', 'exists:artists,id'],
            'album_id' => ['nullable', 'integer:strict', 'exists:album,id'],
        ]);

        // not required, update only those that are changed
        $parameters = [];

        if ($request->name) {
            $parameters['name'] = request('name');
        }

        if ($request->image) {
            $parameters['image'] = Storage::url($request->image->store('song_image', 'public'));  
        }

        if ($request->song_file) {
            $parameters['song_file'] = request('song_file');
        }

        if ($request->artist_id) {
            $parameters['artist_id'] = request('artist_id');
        }

        if ($request->album_id) {
            $parameters['album_id'] = request('album_id');
        }


        if (!empty($parameters)) {
            $song->update($parameters);
        }


        return response($song);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        $song->delete();

        return response($song);
    }
}
