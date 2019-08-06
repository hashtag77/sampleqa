<?php

namespace App\Http\Controllers;

use App\ToDo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToDosController extends Controller
{
    public function create()
    {
        $todos = ToDo::orderBy('created_at', 'desc')->get();

        return view('todos.create')->with([
            'todos' => $todos
        ]);
    }

    public function store(Request $request)
    {
        Todo::create([
            'user_id'   => Auth::user()->id,
            'title'     => Str::title($request->input('title')),
            'section'   => Str::title($request->input('section')),
            'status'    => $request->input('status')
        ]);

        return redirect('/todos/create')->with('success', 'TODO created!');
    }

    public function update(Request $request, $todo_id)
    {
        $todo = ToDo::find($todo_id);
        if($todo->status == "DONE") {
            $todo->status = "PENDING";
        } else {
            $todo->status = "DONE";
        }
        $todo->save();

        return redirect('/todos/create')->with('success', 'TODO updated!');
    }
}
