@extends('adminlte::page')

@section('title','Chamados Abertos')

@section('content_header')
<h1>Chamados</h1>
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
                        <td>{{ $ch->id_chamado }}</td>
                        <td>{{ $ch->name }}</td>
                        <td>{{ $ch->DescricaoCategoria }}</td>
                        <td>{{ $ch->DescricaoSubCategoria }}</td>
                        <td>{{ $ch->descricao }}</td>
                        <td>{{ $ch->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" name="ok_button" id="ok_button">OK</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                    url: "fecharChamado/"+user_id,
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

            $('#ok_button').click(function(){
                $.ajax({
                    method: "post",
                    url: "chamado_encerrado/store/"+user_id,
                });
            });
        });
    </script>
@endsection