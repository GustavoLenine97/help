@extends('adminlte::page')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Usuário</h3><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/usuario">Usuário Home</a></li>
                        <li class="breadcrumb-item active">Deletar</li>
                    </ol>
                </div>
            </div>
        
            <form action="delete" method="post">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label>Deletar Usuário</label>
                        <select id="select" class="form-control" name="id_usuario">
                            @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->id_usuario }}">{{ $usuario->login }}</option>
                            @endforeach
                        </select>
                    </div>
        
                    <div class="box-body">
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger" id="button">Deletar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop

@section('js')
    <script>
        $('#button').click(function(){
            var select = document.getElementById('select').value;
            $.ajax({
                url: "funcionario/mudarstatususuariopendente/"+select,
            });
        });
    </script>
@endsection
