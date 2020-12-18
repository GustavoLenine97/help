@extends('adminlte::page')

@section('content')
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Local</h3><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/local">Local Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="local/cadastrar">
                        <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="fa fa-plus"></i></span>
                            <div class="info-box-content">
                                <h4>Adicionar local</h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="local/deletar">
                        <div class="info-box bg-red">
                            <span class="info-box-icon"><i class="fa fa-minus-circle"></i></span>
                            <div class="info-box-content">
                                <h4>Remover local</h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="local/atualizar">
                        <div class="info-box bg-blue">
                            <span class="info-box-icon"><i class="fa fa-spinner"></i></span>
                            <div class="info-box-content">
                                <h4>Atualizar local</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Lista de Locais</h4>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>ID Local</th>
                            <th>Nome</th>
                            <th>CEP</th>
                            <th>Rua</th>
                            <th>Bairro</th>
                            <th>Telefone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($local as $loc)
                            <tr>
                            <td>{{ $loc->id_local }}</td>
                            <td>{{ $loc->nome_local }}</td>
                            <td>{{ $loc->CEP}}</td>
                            <td>{{ $loc->rua}}</td>
                            <td>{{ $loc->bairro}}</td>
                            <td>{{ $loc->telefone }}</td>
                            </tr>
                            @endforeach
                        </tbody>                    
                    </table>
                </div>
            </div>
            {!! $local->links() !!}
        </div>
    </div>

@endsection