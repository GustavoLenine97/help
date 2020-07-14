@extends('adminlte::page')

@section('content_header')
    <h1>Usuário</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="usuario/cadastrar">
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-plus"></i></span>
                    <div class="info-box-content">
                        <h4>Adicionar um novo usuário</h4>
                    </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </a>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="usuario/deletar">
                <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="fa fa-minus-circle"></i></span>
                    <div class="info-box-content">
                        <h4>Remover usuário</h4>
                    </div>
                <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="usuario/atualizar">
                <div class="info-box bg-blue">
                    <span class="info-box-icon"><i class="fa fa-spinner"></i></span>
                    <div class="info-box-content">
                        <h4>Atualizar usuário</h4>
                    </div>
                <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->     
        </div>

    <!-- /.col -->
    </div>

    <div class="card">
        <div class="card-header">
          <h3>Tabela de Usuário</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table table-striped">
            <thead>
                <tr>
                <th>ID</th>
                <th>Nome </th>
                <th>Email </th>
                <th>Login</th>
                <th>Senha</th>
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
                </tr>
                @endforeach
                </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    
@endsection