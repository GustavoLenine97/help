@extends('adminlte::page')

@section('content_header')
    <h1>SubCategoria</h1>
@endsection

@section('content')
   
    @foreach ($categoria as $cat)
        <form action="submit" method="POST">
        @csrf
            <div class="box-body">
                <div class="form-group">
                    <label>Nome da SubCategoria</label>
                    <input type="hidden" name="subcategoria" value="{{ $cat->CodigoCategoria }}">
                    <input type="text" class="form-control" name="DescricaoSubCategoria" placeholder="Descreva o nome da SubCategoria">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </div>
        </form>
    @endforeach

@endsection
