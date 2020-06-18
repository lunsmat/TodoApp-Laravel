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
        }
        return redirect()
            ->route('todo.add')
            ->with("warning", "You don't have send a title");
    }

    public function update($id)
    {
        $data = DB::select("SELECT * FROM todos WHERE id = :id", [
            'id' => $id
        ]);

        if (count($data) > 0) {
            return view('todo.update', [
                'data' => $data[0]
            ]);
        }
        return redirect()->route('todo.index');
    }

    public function updateAction(Request $request, $id)
    {
        if ($request->filled('title')) {
            $data = DB::select("SELECT * FROM todos WHERE id = :id", [
                'id' => $id
            ]);

            if (count($data) > 0) {
                $title = $request->input('title');
                DB::update("UPDATE todos SET title = :title WHERE id = :id", [
                    'title' => $title,
                    'id' => $id
                ]);
            }
            return redirect()->route('todo.index');
        }
        return redirect()
            ->route('todo.edit', ['id' => $id])
            ->with("warning", "You don't have send a title");
    }

    public function delete(Request $request, $id)
    {
        DB::delete('DELETE FROM todos WHERE id = :id', ['id' => $id]);

        return redirect()->route('todo.index');
    }

    public function resolve(Request $request, $id)
    {

    }
}
