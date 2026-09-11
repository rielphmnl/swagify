<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SwagifyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $query = Song::with('artist');
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

        $query = $query->get();

        return response($query);
    }


    public function playlist(Album $album)
    {
        $query = Song::where('album_id', $album->id);
        $query = $query->with(['artist', 'album']);

        $query = $query->get();

        return response($query);
    }

    public function swagifyalbums()
    {
        $query = new Album();

        return $query->limit(8)->get();
    }

    
}
