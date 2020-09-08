@extends('adminlte::page')

@section('content_header')
    <h1>SubCategoria</h1>
@endsection

@section('content')
   
    @foreach ($subcategoria as $subcat)
        <form action="updated" method="POST">
        @csrf
            <div class="box-body">
                <div class="form-group">
                    <input type="hidden" name="CodigoSubCategoria" value="{{ $subcat->CodigoSubCategoria }}">
                    <label>Nome da SubCategoria</label>
                    <input type="text" class="form-control" name="DescricaoSubCategoria" value="{{ $subcat->DescricaoSubCategoria }}" placeholder="Descreva o nome da Categoria">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </div>
        </form>
    @endforeach
    
@endsection
