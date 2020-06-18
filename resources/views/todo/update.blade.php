@extends('layouts.admin')
@section('title', 'Edit of Todo')

@section('content')
    <h1>Edit a Todo</h1>

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
            <input type="text" name="title" value="{{$data->title}}" />
        </label>

        <input type="submit" value="Update Todo" />
    </form>
@endsection
