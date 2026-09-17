<?php

namespace App\Http\Controllers;

use App\Models\Album;
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
        $query = Song::query();
        $query = $query->with(['artist', 'album']);

        
        if ($request->input('search')) {
            $search = $request->input('search');

            $query = $query
                        ->where('name', 'LIKE', '%' . $request->input('search') . '%')
                        ->orWhereHas('album', function ($q) use ($search) {
                            $q->where('name', 'LIKE', '%' . $search . '%');
                        })
                        ->orWhereHas('artist', function ($q) use ($search) {
                            $q->where('name', 'LIKE', '%' . $search . '%');
                        });
        }

        if ($request->input('album')) {
            $albumId = $request->input('album');

            $query = $query->where('album_id', $albumId);
        }

        $query = $query->get();

        return response($query);
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
            'song_file' => ['required', 'file'], // how? text for now
            'artist_id' => ['nullable', 'numeric', 'exists:artists,id'], // check if exists rule 
            'album_id' => ['required', 'numeric', 'exists:albums,id'], // optional 
        ]);

        // initialized album image as default image 
        $imagePath = Album::find($request->album_id)->image;


        if ($request->image) {
            $imagePath = Storage::url($request->image->store('song_image', 'public'));  
        }


        $artistId = Album::find($request->album_id)->artist_id;

        if ($request->artist_id) {
            $artistId = $request->artist_id;
        }

        $songPath = Storage::url($request->song_file->store('song_file', 'public'));
        

        $new_song = Song::create([
            'name' => request('name'),
            'image' => $imagePath,
            'song_file' => $songPath,
            'artist_id' => $artistId,
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
            'song_file' => ['nullable', 'file'],
            'artist_id' => ['nullable', 'numeric', 'exists:artists,id'],
            'album_id' => ['nullable', 'numeric', 'exists:albums,id'],
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
            $parameters['song_file'] = Storage::url($request->song_file->store('song_file', 'public'));
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
