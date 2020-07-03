@extends('adminlte::page')

@section('content_header')
<h1>Usuário</h1>
@endsection

@section('content')

    <form action="delete" method="POST">
        @csrf
        <div class="form-group">
            <label>Deletar Usuário</label>
            <select name="id_usuario" class="form-control">
                @foreach($usuario as $usu)
                    <option value="{{ $usu->id_usuario }}" > {{ $usu->nome_func }}</option>
                @endforeach 
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-danger">Deletar</button>
        </div>
    </form>
@endsection