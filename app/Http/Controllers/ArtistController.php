<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = new Artist;

        if ($request->input('search')) {
            // $query = $query->orWhere('name', 'LIKE', '%' . $request->search . '%')
            //     ->orWhere('nickname', 'LIKE', '%' . $request->search . '%')
            //     ->orWhere('description', 'LIKE', '%' . $request->search . '%');

            $query = $query->where(function($q){
                $q->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('nickname', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('description', 'LIKE', '%' . $request->search . '%');
            });
        }

        if ($request->input('status')) {
            $query = $query->where('status', $request->status);
        }
        
        // if ((something or smth or smt) and status)

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
        // make image optional
        $request->validate([
            'name' => ['required'],
            'image' => ['required'], //validate image
        ]);

        $new_artist = Artist::create([
            'name' => request('name'),
            'image' => request('image'),
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
        $request->validate([
            'name' => ['required'],
            'image' => [],
        ]);

        $parameters = [
            'name' => request('name'),
        ];


        if ($request->file('image')) {
            //upload image
            //$imagePath = uploaded
            //$parameters['image'] = imagePath;
        }


        $artist->update($parameters);





        return response($artist);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
        $artist->delete();

        return response(Artist::all());
    }
}
