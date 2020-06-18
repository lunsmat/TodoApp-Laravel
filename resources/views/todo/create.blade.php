@extends('layouts.admin')
@section('title', 'Creation of Todo')

@section('content')
    <h1>Add a new Todo</h1>

    @if (session('warning'))
        <x-alert>
            @slot('type')
                Error
            @endslot
            {{ session('warning') }}
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
