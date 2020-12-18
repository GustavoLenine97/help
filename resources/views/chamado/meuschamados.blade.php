@extends('adminlte::page')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Meus chamados</h3><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Meus Chamados</li>
                    </ol>
                </div>
            </div>
        
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table id="example" class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                            <th>ID </th>
                            <th>Categoria</th>
                            <th>Subcategoria</th>
                            <th>Descricao</th>
                            <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chamado as $ch)
                                <tr id="{{ $ch->id_chamado }}">
                                    <td>{{ $ch->id_chamado }}</td>
                                    <td>{{ $ch->DescricaoCategoria }}</td>
                                    <td>{{ $ch->DescricaoSubCategoria }}</td>
                                    <td>{{ $ch->descricao }}</td>
                                    <td>{{ $ch->status_chamado }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {!! $chamado->links() !!}
        </div>
    </div>

    @if(session()->has('message'))
        <script>
            alert('Você não tem acesso!!!!')
        </script>
    @endif
    
    
@endsection