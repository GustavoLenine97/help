@extends('adminlte::page')

@section('content_header')
<h1>Funcionário</h1>
@endsection

@section('content')
    <form action="delete" method="post">
    @csrf
        <div class="box-body">
            <div class="form-group">
                <label>Deletar funcionário</label>
                <select class="form-control" name="nome_func" id="">
                @foreach($funcionarios as $func)
                    <option value="{{ $func->id_func }}">{{ $func->nome_func }}</option>
                @endforeach
                </select>
            </div>

            <div class="box-body">
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            </div>
        </div>
    </form>
@stop