<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        return view('todo.index');
    }

    public function create(Request $request)
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {

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
