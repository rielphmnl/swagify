<?php

use Illuminate\Support\Facades\Route;
use App\Models\Todo;

Route::get('/', function () {

    $todos = Todo::all();

    return view('todos', [
        'todos' => $todos,
    ]);
});

Route::get('/todos', function () {
    return view('todos');
});

Route::get('/todo', function () {
    return view('todo');
});

Route::get('/create', function () {
    return view('create');
});