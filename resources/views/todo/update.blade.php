@extends('layouts.admin')
@section('title', 'Edit of Todo')

@section('content')
    <h1>Edit a Todo</h1>

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
            <input type="text" name="title" value="{{$data->title}}" />
        </label>

        <input type="submit" value="Update Todo" />
    </form>
@endsection
