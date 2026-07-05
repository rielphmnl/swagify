<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\TodoController;
use App\Models\Album;
use Illuminate\Support\Facades\Route;
use App\Models\Todo;

// home redirect to show all
Route::get('/', function () {
    // return redirect('/todos');
    return view('welcome');
});


// Route::middleware('auth')->group(function() {
    // read all
    Route::get('/todos', [TodoController::class, 'index']);
    // create page
    Route::get('/todos/create', [TodoController::class, 'create']);
    // create
    Route::post('/todos', [TodoController::class, 'store']);
    // read 1
    Route::get('/todos/{todo}', [TodoController::class, 'edit']);
    // update
    Route::patch('/todos/{todo}', [TodoController::class, 'update']);
    // delete
    Route::delete('/todos/{todo}', [TodoController::class, 'destroy']);

    // logout
    Route::delete('/logout', [SessionsController::class, 'destroy']);
// });

Route::middleware('guest')->group(function() {
    // signup form
    Route::get('/register', [RegisteredUserController::class, 'create']);
    // store
    Route::post('/register', [RegisteredUserController::class, 'store']);

    // login page
    Route::get('/login', [SessionsController::class, 'create']);
    // login user
    Route::post('/login', [SessionsController::class, 'store']);
});


// artists
Route::get('/artists', [ArtistController::class, 'index']);
Route::get('/artists/create', [ArtistController::class, 'create']);
Route::post('/artists', [ArtistController::class, 'store']);
Route::get('/artists/{artist}', [ArtistController::class, 'show']);
Route::get('/artists/{artist}/edit', [ArtistController::class, 'edit']);
Route::put('/artists/{artist}', [ArtistController::class, 'update']);
Route::delete('/artists/{artist}', [ArtistController::class, 'destroy']);


// albums
Route::get('/albums', [AlbumController::class, 'index']);
Route::get('/albums/create', [AlbumController::class, 'create']);
Route::post('/albums', [AlbumController::class, 'store']);
Route::get('/albums/{album}', [AlbumController::class, 'show']);
Route::get('/albums/{album}/edit', [AlbumController::class, 'edit']);
Route::put('/albums/{album}', [AlbumController::class, 'update']);
Route::delete('/albums/{album}', [AlbumController::class, 'destroy']);


// songs assuming not headed by /album/{album}/songs/{song}
Route::get('/songs', [SongController::class, 'index']);
Route::get('/songs/create', [SongController::class, 'create']);
Route::post('/songs', [SongController::class, 'store']);
Route::get('/songs/{song}', [SongController::class, 'show']);
Route::get('/songs/{song}/edit', [SongController::class, 'edit']);
Route::put('/songs/{song}', [SongController::class, 'update']);
Route::delete('/songs/{song}', [SongController::class, 'destroy']);




