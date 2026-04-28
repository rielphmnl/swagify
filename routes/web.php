<?php

use Illuminate\Support\Facades\Route;
use App\Models\Todo;

Route::get('/', function () {

    return redirect('/todos');
});

Route::get('/todos', function () {
    $todos = Todo::where('isDeleted', 0)->get();

    return view('todos/index', [
        'todos' => $todos,
    ]);
});

Route::post('/todos', function () {
    $todo = request('todo');
    $isDone = request('isDone') === 'on' ? 1 : 0;

    Todo::create([
        'todo' => $todo,
        'isDone' => $isDone,
        'isDeleted' => 0,
    ]);

    return redirect('/');
});

Route::get('/todos/{id}', function ($id) {
    $todo = Todo::find($id);

    return view('todos/todo', [
        'todo' => $todo,
    ]);
});

Route::get('/create', function () {
    return view('create');
});