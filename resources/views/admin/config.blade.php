@extends('layouts.admin')
@section('title', 'Configurações')

@section('content')
    <h1>Configurações</h1>

    <a href="/logout">Sair</a>

    <x-alert>
        @slot('type')
            Error 404
        @endslot
        Deu algum erro e eu não sei qual!
    </x-alert>

    Meu nome é: {{ $name }}<br />

    @if ($age >= 18)
        <p>Eu sou maior de idade</p>
    @else
        <p>Eu não sou maior de idade</p>
    @endif

    @isset($version)
        <p>Existe uma versão e é {{$version}}</p>
    @endisset

    @empty($city)
        <p>Não existe uma cidade<p>
    @endempty

    @for($i = 1; $i <= 10; $i++)
        O valor é {{$i}} <br />
    @endfor


    <br />
    {{-- @if(count($cakelist) > 0)
        <ul>
            @foreach ($cakeList as $item)
                <li>{{$item}}</li>
            @endforeach
        </ul>
    @else
        Não existem ingredientes
    @endif --}}
    <ul>
        @forelse ($cakeList as $item)
            <li>$item</li>
        @empty
            <li>Não há ingredientes</li>
        @endforelse
    </ul>
    <br />

    <form method="POST">
        @csrf
        Nome: <br/>
        <input type="name" name="name" /><br />
        Idade: <br/>
        <input type="name" name="age" /><br />
        Cidade: <br/>
        <input type="name" name="city" /><br />

        <input type="submit" value="Enviar">
    </form>

    <a href="/config/info">Informações</a>
@endsection
