<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $list = Todo::all(); // With eloquent ORM

        return view('todo.index', [
            'list' => $list
        ]);
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => [ 'required', 'string', 'max:128' ]
        ]);

        $title = $request->input('title');

        $todo = new Todo();
        $todo->title = $title;
        $todo->save();

        return redirect()->route('todo.index');
    }

    public function update($id)
    {
        $data = Todo::find($id);

        if ($data) {
            return view('todo.update', [
                'data' => $data
            ]);
        }
        return redirect()->route('todo.index');
    }

    public function updateAction(Request $request, $id)
    {
        $request->validate([
            'title' => [ 'required', 'string', 'max:128' ]
        ]);

        $title = $request->input('title');

        Todo::find($id)->update(['title' => $title]);

        return redirect()->route('todo.index');
    }

    public function delete($id)
    {
        Todo::find($id)->delete();

        return redirect()->route('todo.index');
    }

    public function resolve($id)
    {
        $todo = Todo::find($id);
        if ($todo) {
            $todo->resolved = 1 - $todo->resolved;
            $todo->save();
        }

        return redirect()->route('todo.index');
    }
}
