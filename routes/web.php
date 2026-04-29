<?php

use Illuminate\Support\Facades\Route;
use App\Models\Todo;

// home redirect to show all
Route::get('/', function () {

    return redirect('/todos');
});

// read all
Route::get('/todos', function () {
    $todos = Todo::where('isDeleted', 0)->get();

    return view('todos/index', [
        'todos' => $todos,
    ]);
});

// create
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

// read 1
Route::get('/todos/{id}', function ($id) {
    $todo = Todo::find($id);

    return view('todos/todo', [
        'todo' => $todo,
    ]);
});

// update
Route::patch('/todos/{id}', function (Todo $id) {
    $todo = request('todo');
    $isDone = request('isDone') === 'on' ? 1 : 0;


    $id->update([
        'todo' => $todo,
        'isDone' => $isDone,
    ]);

    return redirect ('/todos');
});

// delete
Route::delete('/todos/{id}', function (Todo $id) {
    $id->update([
        'isDeleted' => 1,
    ]);

    // $id->delete();

    return redirect ('/todos');
});

// create page
Route::get('/create', function () {
    return view('create');
});