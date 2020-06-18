@extends('layouts.admin')
@section('title', 'Creation of Todo')

@section('content')
    <h1>Add a new Todo</h1>

    @if ($errors->any())
        <x-alert>
            @foreach ($errors->all() as $error)
                {{$error}}<br />
            @endforeach
        </x-alert>
    @endif

    <form method="post">
        @csrf
        <label>
            Title: <br />
            <input type="text" name="title" />
        </label>

        <input type="submit" value="Add Todo" />
    </form>
@endsection
