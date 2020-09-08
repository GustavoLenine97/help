@extends('adminlte::page')

@section('content_header')
    <h1>Usuário</h1>
@endsection

@section('content')
    <form action="update" method="post">
    @csrf
        <div class="box-body">
            <div class="form-group">
                <label>Atualizar Usuário</label>
                <select class="form-control" name="id_usuario" id="">
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id_usuario }}">{{ $usuario->login }}</option>
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