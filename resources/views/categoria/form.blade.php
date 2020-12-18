@extends('adminlte::page')

@section('content')
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Categoria</h3><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/categoria">Categoria Home</a></li>
                        <li class="breadcrumb-item active">Cadastrar</li>
                    </ol>
                </div>
            </div>
            
            <form action="submit" method="POST">
            @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label>Nome da Categoria</label>
                        <input type="text" class="form-control" name="DescricaoCategoria" placeholder="Descreva o nome da Categoria">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection
