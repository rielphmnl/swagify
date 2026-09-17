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
    public function playlist(Album $album)
    {
        // unused
        // unused
        // unused
        
        // $query = Song::where('album_id', $album->id);
        // $query = $query->with(['artist', 'album']);

        // $query = $query->get();

        // return response($query);
    }
    
}
