@extends('adminlte::page')

@section('content_header')
    <h1>Usuário</h1>
@endsection

@section('content')
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
