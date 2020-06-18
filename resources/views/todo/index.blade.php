@extends('layouts.admin')
@section('title', 'List of TODOS')

@section('content')
    <h2>List of Todos</h2>

    <a href="/todo/add">Add a new todo</a>

    @if (count($list) > 0)
        <ul>
        @foreach ($list as $item)
            <li>
                <a href={{ route('todo.done', ['id' => $item->id]) }}>[ @if ($item->resolved) unmark @else mark @endif ]</a>
                {{$item->title}}
                <a href={{ route('todo.edit', ['id' => $item->id]) }}>[ Edit ]</a>
                <a href={{ route('todo.del', ['id' => $item->id]) }}>[ Delete ]</a>
            </li>
        @endforeach
        </ul>
    @else
        <p>There is not items to be listed</p>
    @endif
@endsection
