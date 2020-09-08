@extends('adminlte::page')

@section('title','Chamados encerrados')

@section('content_header')
    <h1>Chamados encerrados</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Tabela chamados encerrados</h4>   

            <form action="{{ route('encerrado.search')}}" method="post" class="form form-inline float-right">
                @csrf
                <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-info">Pesquisar</button>
            </form>     
        </div>

        <div class="card-body p-0">
        <table id="example" class="table table-striped">
            <thead>
            <tr>
            <th>ID </th>
            <th>Técnico</th>
            <th>Categoria</th>
            <th>SubCategoria</th>
            <th>Descrição</th>
            <th>Usuário</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($chamado_enc as $item)
                <tr>
                    <td>{{ $item->id_cha_enc }}</td>
                    <td>{{ $item->tecnico }}</td>
                    <td>{{ $item->DescricaoCategoria}}</td>
                    <td>{{ $item->DescricaoSubCategoria}}</td>
                    <td>{{ $item->descricao }}</td>
                    <td>{{ $item->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>

    <div id="container" style="width:100%; height=400px;"></div>

@endsection

@section('js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
@endsection