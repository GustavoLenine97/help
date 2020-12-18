@extends('adminlte::page')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Funcionário</h3><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/funcionario">Funcionário Home</a></li>
                        <li class="breadcrumb-item active">Atualizar</li>
                    </ol>
                </div>
            </div>

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
        </div>
    </div>
@stop