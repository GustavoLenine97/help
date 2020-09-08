@extends('adminlte::page')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 text-dark">Lista Telefônica </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Lista de Telefones</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
          <h4>Lista de Telefones</h4>
        </div>
        
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th>Local</th>
                    <th>Numero</th>
                    <th>CEP</th>
                    <th>Rua</th>
                    <th>Bairro</th>
                    <th>Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($local as $loc)
                    <tr>
                    <td>{{ $loc->nome_local }}</td>
                    <td>{{ $loc->numero }}</td>
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
@stop