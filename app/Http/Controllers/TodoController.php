<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index()
    {
        $list = DB::select("SELECT * FROM todos");

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
        if ($request->filled('title')) {
            $title = $request->input('title');

            DB::insert('INSERT INTO todos (title) VALUES (:title)', [
                'title' => $title
            ]);

            return redirect()->route('todo.index');
        } else {
            return redirect()
                ->route('todo.add')
                ->with("warning", "You don't have send a title");
        }
    }

    public function update(Request $request, $id)
    {
        return view('todo.update');
    }

    public function updateAction(Request $request, $id)
    {

    }

    public function delete(Request $request, $id)
    {

    }

    public function resolve(Request $request, $id)
    {

    }
}
