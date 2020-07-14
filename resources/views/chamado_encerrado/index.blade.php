@extends('adminlte::page')

@section('title','Chamados encerrados')

@section('content_header')
    <h1>Chamados encerrados</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
        </div>
        
        <div class="card-body">
        <table id="example" class="table table-bordered table-striped">
            <thead>
            <tr>
            <th>ID </th>
            <th>ID Chamado Encerrado</th>
            <th>Técnico</th>
            <th>Usuário</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($chamado_enc as $item)
                <tr>
                    <td>{{ $item->id_cha_enc }}</td>
                    <td>{{ $item->id_chamado }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->id_user}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection