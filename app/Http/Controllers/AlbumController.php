<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = new Album();

        if ($request->input('search')) {
            $query = $query->where('name', 'LIKE', '%' . $request->input('search') . '%');
        }

        if ($request->input('limit')) {
            $query = $query->limit($request->input('limit'));
        }

        
        $albums = $query->get();

        return response($albums);
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
            'artist_id' => ['required', 'numeric', 'exists:artists,id'],
        ]);

        // initialized default song/album image
        $imagePath = Storage::url('dafault_song.png');

        if ($request->image) {
            $imagePath = Storage::url($request->image->store('song_image', 'public'));  
        }

        // nagsstore so dito ang sira koooooooo
        // grrrr
        // so ang mali ko is hindi niya nakikita as number ang artist_id, how to fix???
        // integer is type strict. numeric accepts numeric strings. don't apply :strict
        $new_album = Album::create([
            'name' => request('name'),
            'image' => $imagePath,
            'artist_id' => request('artist_id'),
        ]);

        return response($new_album);
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        return response($album);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'name' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:5120'],
            'artist_id' => ['nullable', 'numeric', 'exists:artists,id'],
        ]);

        // update only indicated
        if ($request->name) {
            $parameters['name'] = request('name');
        }

        if ($request->image) {
            $parameters['image'] = Storage::url($request->image->store('song_image', 'public'));  
        }

        if ($request->artist_id) {
            $parameters['artist_id'] = request('artist_id');
        }

        
        if (!empty($parameters)) {
            $album->update($parameters);
        }


        return response($album);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $album->delete();

        return response($album);
    }
}
