<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(Album::all());
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
            'artist_id' => ['integer'],
        ]);


        $new_album = Album::create([
            'name' => request('name'),
            'image' => request('image'),
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
            'name' => ['required'],
            'image' => ['required'],
            'artist_id' => ['integer:strict'],
        ]);

        $album->update([
            'name' => request('name'),
            'image' => request('image'),
            'artist_id' => request('artist_id'),
        ]);

        return response($album);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $album->delete();

        return response(Album::all());
    }
}
