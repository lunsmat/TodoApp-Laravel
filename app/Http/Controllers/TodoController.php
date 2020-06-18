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
        $request->validate([
            'title' => [ 'required', 'string', 'max:128' ]
        ]);

        $title = $request->input('title');

            DB::insert('INSERT INTO todos (title) VALUES (:title)', [
                'title' => $title
            ]);

            return redirect()->route('todo.index');
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
        $request->validate([
            'title' => [ 'required', 'string', 'max:128' ]
        ]);

        $title = $request->input('title');
        DB::update("UPDATE todos SET title = :title WHERE id = :id", [
            'title' => $title,
            'id' => $id
        ]);

        return redirect()->route('todo.index');
    }

    public function delete($id)
    {
        DB::delete('DELETE FROM todos WHERE id = :id', ['id' => $id]);

        return redirect()->route('todo.index');
    }

    public function resolve($id)
    {
        // option 1: Verify if exists and update
        // $data = DB::select('SELECT * FROM todos WHERE id = :id', [
        //     'id' => $id
        // ]);

        // if(count($data) > 0) {
        //     if ($data[0]->resolved === 1) {
        //         DB::update("UPDATE todos SET resolved = 0 WHERE id = :id", [
        //             'id' => $id
        //         ]);
        //     } else {
        //         DB::update("UPDATE todos SET resolved = 1 WHERE id = :id", [
        //             'id' => $id
        //         ]);
        //     }
        // }

        // option 2: logic update
        DB::update('UPDATE todos SET resolved = 1 - resolved WHERE id = :id', [
            'id' => $id
        ]);

        return redirect()->route('todo.index');
    }
}
