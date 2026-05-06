<?php

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
