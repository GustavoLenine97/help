<?php use Carbon\Carbon;?>
@extends('adminlte::page')

@section('title','Chamados Abertos')
    
@section('content')
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Chamados</h3><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/chamado">Chamados Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Chamados Abertos</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table id="example" class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                    <th>ID </th>
                                    <th>Usuário</th>
                                    <th>Categoria</th>
                                    <th>Subcategoria</th>
                                    <th>Descricao</th>
                                    <th>Data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($chamado as $ch)
                                        <tr id="{{ $ch->id_chamado }}">
                                            {{ csrf_field() }}
                                            <td>{{ $ch->id_chamado }}</td>
                                            <td>{{ $ch->name }}</td>
                                            <td>{{ $ch->DescricaoCategoria }}</td>
                                            <td>{{ $ch->DescricaoSubCategoria }}</td>
                                            <td>{{ $ch->descricao }}</td>
                                            <td>{{ $ch->data }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{ $chamado->links() }}
                </div>
            </div>
        </div>
    </div>  

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Fechar chamado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="ok_button" name="ok_button">Fechar</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Fechar Chamado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="text-center">
                    <input type="hidden" name="category" id="id_chamado">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Fechar</button>
                <button type="button" name="ok_button" id="ok_button" class="btn btn-info">JS</button>
                <button type="button" class="btn btn-primary" id="ok_button" name="ok_button">Save changes</button>
            </div>
            </div>
        </div>
    </div>

@stop
@section('js') 
    <script>
        $(document).ready(function(){
            $('#example').on('click','tr',function(){
                user_id = $(this).attr('id');
                $('#confirmModal').modal();
                //alert(user_id)
            });

            $('#ok_button').click(function(){
                $.ajax({
                    url: "chamado/destroy/"+user_id,
                    beforeSend:function(){
                        $('#ok_button').text('Deleting...');
                    },
                    success:function(data){
                        setTimeout(function(){
                            $('#delete').modal('hide');
                            window.location.reload();
                            $('#ok_button').text('OK');
                        }, 2000);
                    }
                });
            });

            $('#ok_button').click(function(){
                $.ajax({
                    url: "chamado/chamado_encerrado/"+user_id,
                    beforeSend:function(){
                        $('#ok_button').text('Deleting...');
                    },
                    success:function(data){
                        setTimeout(function(){
                            $('#confirmModal').modal('hide');
                            window.location.reload();
                            $('#ok_button').text('OK');
                        }, 2000);
                    }
                });
            });
            
        });
    </script>
@endsection
