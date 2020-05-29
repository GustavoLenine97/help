@extends('adminlte::page')

@section('content_header')
<h1>Cargo</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="cargo/cadastrar">
            <div class="info-box bg-blue">
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
            <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-level-up"></i></span>
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

<h2>Cargo</h2>
<div class="row">


<table class="table table-bordered">
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
@endsection