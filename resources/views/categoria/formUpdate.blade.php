@extends('adminlte::page')

@section('content_header')
    <h1>Categoria</h1>
@endsection

@section('content')
    <form action="update" method="post">
    @csrf
        <div class="box-body">
            <div class="form-group">
                <label>Atualizar Categoria</label>
                <select class="form-control" name="id_cat" id="">
                    @foreach($categoria as $cat)
                        <option value="{{ $cat->CodigoCategoria }}">{{ $cat->DescricaoCategoria }}</option>
                    @endforeach
                </select>
            </div>

            <div class="box-body">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </div>
        </div>
    </form>
@stop