<?php

use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use App\Models\Todo;

// home redirect to show all
Route::get('/', function () {
    return redirect('/todos');
});

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


// signup form
Route::get('/register', [RegisteredUserController::class, 'create']);
// store
Route::post('/register', [RegisteredUserController::class, 'store']);

//logout
Route::delete('/logout', [SessionsController::class, 'destroy']);
// login page
Route::get('/login', [SessionsController::class, 'create']);
// login user
Route::post('/login', [SessionsController::class, 'store']);