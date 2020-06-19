@extends('layouts.admin')
@section('title', 'Cadastro')

@section('content')
    @if ($errors->any())
        <x-alert>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </x-alert>
    @endif

    <form method="post">
        @csrf
        <input type="text" name="name" placeholder="Digite sue nome ..." value="{{old('name')}}" /><br />
        <input type="email" name="email" placeholder="Digite um email..." value="{{old('email')}}" /><br />
        <input type="password" name="password" placeholder="Digite uma senha" value="{{old('password')}}" /><br />
        <input type="password" name="password_confirmation" placeholder="Confirme sua senha" value="{{old('password_confirmation')}}" /><br />
        <input type="submit" value="Entrar">
    </form>
@endsection
