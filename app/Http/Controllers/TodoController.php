<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::where('isDeleted', 0)->get();

        return view('todos/index', [
            'todos' => $todos,
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $todo = request('todo');
        $isDone = request('isDone') === 'on' ? 1 : 0;

        Todo::create([
            'todo' => $todo,
            'isDone' => $isDone,
            'isDeleted' => 0,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        $todo = Todo::find($todo->id);

        return view('todos/todo', [
            'todo' => $todo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $task = request('todo');
        $isDone = request('isDone') === 'on' ? 1 : 0;


        $todo->update([
            'todo' => $task,
            'isDone' => $isDone,
        ]);

        return redirect ('/todos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->update([
            'isDeleted' => 1,
        ]);

        // $todo->delete();

        return redirect ('/todos');
    }
}
