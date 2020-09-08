@extends('adminlte::page')

@section('content_header')
    <h1>Usuário</h1>
@endsection

@section('content')
   
   <form action="submit" method="POST">
    @csrf
        <div class="box-body">
            <div class="form-group">
                <label>Funcionário</label>
                <select id="select" class="form-control" name="id_func">
                    @foreach($funcionario as $func)
                        <option value="{{ $func->id_func }}">{{$func->nome_func}}</option>
                    @endforeach 
                </select>
            </div>
        
            <div class="form-group">
                <label>E-mail</label>
                <input type="email" class="form-control" name="email" placeholder="Descreva o seu email">
            </div>

            <div class="form-group">
                <label>Login</label>
                <input type="text" class="form-control" name="login" placeholder="Descreva o seu login">
            </div>

            <div class="form-group">
                <label>Senha</label>
                <input type="password" class="form-control" name="password" placeholder="Descreva a sua senha">
            </div>

            </div>
    
            <div class="form-group">
                <button type="submit" class="btn btn-success" id="button">Cadastrar</button>
            </div>
        </div>
    </form>

@endsection

@section('js')
    <script>
        $('#button').click(function(){
            var select = document.getElementById('select').value;
            $.ajax({
                url: "funcionario/mudarstatususuarioativo/"+select,
            })
        });
    </script>
@endsection
