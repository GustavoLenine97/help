@extends('adminlte::page')

@section('content_header')
    <h1>Funcionario</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="funcionario/cadastrar">
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-plus"></i></span>
                    <div class="info-box-content">
                        <h4>Adicionar funcionário</h4>
                    </div>
                <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="funcionario/deletar">
                <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="fa fa-minus-circle"></i></span>
                    <div class="info-box-content">
                        <h4>Remover funcionário</h4>
                    </div>
                <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="categoria/atualizar">
                <div class="info-box bg-blue">
                    <span class="info-box-icon"><i class="fa fa-spinner"></i></span>
                    <div class="info-box-content">
                        <h4>Atualizar funcionário</h4>
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
          <h4>Tabela de Funcionários</h4>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                <th>ID Funcionário</th>
                <th>Nome </th>
                <th>Cargo </th>
                <th>CPF</th>
                <th>Local</th>
                </tr>
                </thead>
                <tbody>
                @foreach($funcionario as $func)
                <tr>
                <td>{{ $func->id_func }}</td>
                <td>{{ $func->nome_func }}</td>
                <td>{{$func->cargo }}</td>
                <td>{{ $func->CPF }}</td>
                <td>{{ $func->nome_local }}</td>
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