@extends('adminlte::page') 

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Cargo</h3><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/cargo">Cargo Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="cargo/cadastrar">
                        <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="fa fa-plus"></i></span>
                            <div class="info-box-content">
                                <h4>Adicionar cargo</h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="cargo/deletar">
                        <div class="info-box bg-red">
                            <span class="info-box-icon"><i class="fa fa-minus-circle"></i></span>
                            <div class="info-box-content">
                                <h4>Remover cargo</h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="cargo/atualizar">
                        <div class="info-box bg-blue">
                            <span class="info-box-icon"><i class="fa fa-spinner"></i></span>
                            <div class="info-box-content">
                                <h4>Atualizar cargo</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Tabela de Cargo</h4>
                </div>
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
            </div>
            {!! $cargo->links() !!}
        </div>
    </div>

@endsection