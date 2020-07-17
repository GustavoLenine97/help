@extends('adminlte::page')

@section('content_header')
    <h1>Cargo</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="cargo/cadastrar">
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-plus"></i></span>
                    <div class="info-box-content">
                        <h4>Adicionar um novo cargo</h4>
                    </div>
                <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="local/deletar">
                <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="fa fa-minus-circle"></i></span>
                    <div class="info-box-content">
                        <h4>Remover local</h4>
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
                        <h4>Atualizar categoria</h4>
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
          <h4>Tabela de Cargo</h4>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                <th>ID Cargo</th>
                <th>Nome Cargo</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cargo as $car)
                <tr>
                <td>{{ $car->id_cargo }}</td>
                <td>{{ $car->cargo }}</td>
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