<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::where("user_id", 1)->get(); //query

        // return view('todos/index', [
        //     'todos' => $todos,
        // ]);
        return response($todos);
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
        $request->validate([
            'todo' => ['required', 'min:3'],
        ]);

        $todo = $request->input('todo');
        $isDone = request('isDone') === 'on' ? 1 : 0;

        $new_todo = Todo::create([
            'todo' => $todo,
            'isDone' => $isDone,
            'user_id' => 1, // Auth::user()->id,
        ]);

        // return redirect('/');
        return response($new_todo);
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
        // Gate::authorize('update', $todo);   

        if ($todo->user_id !== Auth::user()->id) {
            return response("You are not authorized to edit this todo", 403);
        }

        return view('todos/todo', [
            'todo' => $todo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        Gate::authorize('update', $todo);

        $request->validate([
            'todo' => ['required', 'min:3'],
        ]);

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
        Gate::authorize('update', $todo);

        $todo->delete();

        return redirect ('/todos');
    }
}
