<?php

namespace App\Http\Controllers;

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
            $query = $query->where('name', 'LIKE', '%' . $request->input('search') . '%');
        }

        $query = $query->get();

        return response($query);
    }

    
}
