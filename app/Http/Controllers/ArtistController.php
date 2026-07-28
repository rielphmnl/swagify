<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = new Artist;

        if ($request->input('search')) {
            $query = $query->where('name', 'LIKE', '%' . $request->input('search') . '%');
        }

        
        $artists = $query->get();

        return response($artists);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('create_artist');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:5120'], //validate image
        ]);

        // initialized default image
        $imagePath = Storage::url('dafault_artist.webp');

        if ($request->image) {
            $imagePath = Storage::url($request->image->store('artist_image', 'public'));  
        }


        $new_artist = Artist::create([
            'name' => request('name'),
            'image' => $imagePath,
        ]);

        return response($new_artist);
    }

    /**
     * Display the specified resource.
     */
    public function show(Artist $artist)
    {
        return response($artist);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artist $artist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        // dd($request->all()); //bakit null??? //ok na, postman problem
        $request->validate([
            'name' => ['required', 'string'],
            'image' => ['required', 'image', 'max:5120'],
        ]);


        // tama ba to???
        $parameters = [];

        if ($request->name) {
            $parameters['name'] = request('name');
        }

        if ($request->image) {
            $parameters['image'] = Storage::url($request->image->store('artist_image', 'public'));  
        }

        if (!empty($parameters)) {
            $artist->update($parameters);
        }

        
        return response($artist);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
        $artist->delete();

        return response($artist);
    }
}
