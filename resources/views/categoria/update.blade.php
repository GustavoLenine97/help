@extends('adminlte::page')

@section('content_header')
    <h1>Categoria</h1>
@endsection

@section('content')
   
    @foreach ($categoria as $cat)
        <form action="updated" method="POST">
        @csrf
            <div class="box-body">
                <div class="form-group">
                    <input type="hidden" name="CodigoCategoria" value="{{ $cat->CodigoCategoria }}">
                    <label>Nome da Categoria</label>
                    <input type="text" class="form-control" name="DescricaoCategoria" value="{{ $cat->DescricaoCategoria }}" placeholder="Descreva o nome da Categoria">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </div>
        </form>
    @endforeach
    
@endsection
