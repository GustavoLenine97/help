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
                        <li class="breadcrumb-item active">Deletar</li>
                    </ol>
                </div>
            </div>

            <form action="delete" method="post">
            @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label>Deletar funcionário</label>
                        <select class="form-control" name="id_func">
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
        </div>
    </div>
    
@stop

