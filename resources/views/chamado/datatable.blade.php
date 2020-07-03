@extends('adminlte::page')

@section('content_header')
    <h1>Chamados</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>SubCategoria</th>
                            <th>Descricao</th>  
                            <th>Data</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script text="text/javascript">
        $(document).ready(function(){
            var table = $('#user_table').DataTable();
 
            $('#user_table tbody').on( 'click', 'tr', function () {
                console.log( table.row( this ).data() );
            } );
            
            /*
            var table = $('#user_table').DataTable({
                processing: true,
                serverSide: true,
                ajax:{
                    url: "{{ route('chamado.index')}}",
                },
                columns:[
                    {
                        data:'status',
                        render:function(data){
                            if(data === 'Aberto'){
                                return data;
                            }
                        }
                    },
                    {   
                        data: 'id_chamado',
                        name: 'id_chamado',
                    },
                    {
                        data: 'id_user',
                        name: 'id_user',
                    },
                    {
                        data: 'id_cat',
                        name: 'id_cat',
                    },
                    {
                        data: 'id_subcat',
                        name: 'id_subcat',
                    },
                    {
                        data: 'descricao',
                        name: 'descricao',
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    }
                ]
            });
         
            var user_id;

            table.on('click','.sbtn',function(){
                user_id = $(this).attr('id');
                alert(user_id);
                //$('#confirmModal').modal();
                $.ajax({
                    url: "destroy/"+user_id,
                    success: function(data)
                    {
                        window.location.reload();
                    }
                });
            });

            table.on('click','.btn',function(){
                user_id = $(this).attr('id');
                $('#confirmModal').modal('show');                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
            });
            
            $('#ok_button').click(function(){
                $.ajax({
                    url: "destroy/"+user_id,
                    beforeSend:function(){
                        $('#ok_button').text('Deleting...');
                    },
                    success:function(data){
                        setTimeout(function(){
                            $('#confirmModal').modal('hide');
                            $('#user_table').DataTable().ajax.reload();
                            //alert('Data Deleted');
                            $('#ok_button').text('OK');
                        }, 2000);
                    }
                });
            });
            */
        });
    </script>
@endsection