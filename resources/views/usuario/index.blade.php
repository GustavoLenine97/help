@extends('adminlte::page')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 text-dark">Usuário </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="usuario/cadastrar">
                    <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="fa fa-plus"></i></span>
                        <div class="info-box-content">
                            <h4>Adicionar usuário</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="usuario/deletar">
                    <div class="info-box bg-red">
                        <span class="info-box-icon"><i class="fa fa-minus-circle"></i></span>
                        <div class="info-box-content">
                            <h4>Remover usuário</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="usuario/atualizar">
                    <div class="info-box bg-blue">
                        <span class="info-box-icon"><i class="fa fa-spinner"></i></span>
                        <div class="info-box-content">
                            <h4>Atualizar usuário</h4>
                        </div>
                    </div>
                </a>    
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Tabela de Usuário</h4>
            </div>
            
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Nome </th>
                        <th>Email </th>
                        <th>Login</th>
                        <th>Senha</th>
                        <th>Local</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuario as $usu)
                        <tr>
                        <td>{{ $usu->id_usuario }}</td>
                        <td>{{ $usu->nome_func }}</td>
                        <td>{{ $usu->email }}</td>
                        <td>{{ $usu->login }}</td>
                        <td>{{ $usu->password }}</td>
                        <td>{{ $usu->nome_local }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection