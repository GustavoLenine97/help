@extends('adminlte::page')

@section('content_header')
    <h1>Funcionário</h1>
@endsection

@section('content')
    <form action="update" method="post">
    @csrf
        <div class="box-body">
            <div class="form-group">
                <label>Atualizar funcionário</label>
                <select class="form-control" name="id_func" id="">
                @foreach($funcionarios as $func)
                    <option value="{{ $func->id_func }}">{{ $func->nome_func }}</option>
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