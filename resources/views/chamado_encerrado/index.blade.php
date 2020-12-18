@extends('adminlte::page')

@section('title','Chamados encerrados')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Chamados Encerrados</h3><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/chamado_encerrado">Chamados Encerrados Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>

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
                    <th>Data </th>
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
                            <td>{{ $item->data_e }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            {!! $chamado_enc->links() !!}
        </div>
    </div>

    <div id="container" style="width:100%; height=400px;"></div>

@endsection

@section('js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
@endsection