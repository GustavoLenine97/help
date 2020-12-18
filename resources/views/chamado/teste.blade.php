@extends('adminlte::page')

@section('content')
    <h1>Teste</h1>

    <h1>{{!! (route('numero', ['teste' => 1]))!!}}</h1>

    @for ($i = 0; $i < 10; $i++)
        The current value is {{ $i }}<br>
    @endfor

    {{ $quantidade = 1 }}

    @each('chamado.count', $quantidade)

@endsection

