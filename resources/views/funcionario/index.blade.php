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
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="funcionario/cadastrar">
                        <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="fa fa-plus"></i></span>
                            <div class="info-box-content">
                                <h4>Adicionar funcionário</h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="funcionario/deletar">
                        <div class="info-box bg-red">
                            <span class="info-box-icon"><i class="fa fa-minus-circle"></i></span>
                            <div class="info-box-content">
                                <h4>Remover funcionário</h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="funcionario/atualizar">
                        <div class="info-box bg-blue">
                            <span class="info-box-icon"><i class="fa fa-spinner"></i></span>
                            <div class="info-box-content">
                                <h4>Atualizar funcionário</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                <h4>Tabela de Funcionários</h4>
                </div>
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
            </div>
            {!! $funcionario->links() !!}
        </div>
    </div>
    
@endsection