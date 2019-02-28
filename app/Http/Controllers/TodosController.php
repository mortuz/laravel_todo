<?php

namespace App\Http\Controllers;

use Session;
use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    //
    public function index()
    {
        $todos = Todo::all();

        return view('todos')->with('todos', $todos);
    }

    public function create(Request $request)
    {
        $todo = new Todo;

        $todo->todo = $request->todo;

        $todo->save();

        Session::flash('success', 'Your todo is created.');

        return redirect()->back();
    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        Session::flash('error', 'Your todo is deleted.');

        return redirect()->back();
    }

    public function edit($id)
    {
        $todo = Todo::find($id);

        return view('update')->with('todo', $todo);
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        $todo->todo = $request->todo;
        $todo->save();

        Session::flash('info', 'Your todo is updated.');

        return redirect()->route('todos');
    }

    public function complete($id)
    {
        $todo = Todo::find($id);
        $todo->completed = 1;
        $todo->save();

        Session::flash('success', 'Your todo is marked as completed.');

        return redirect()->back();
    }
}
