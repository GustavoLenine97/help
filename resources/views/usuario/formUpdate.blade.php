@extends('adminlte::page')

@section('content_header')
<h1>Usuário</h1>
@endsection

@section('content')
   @foreach($usuario as $usu)
   <form action="update" method="POST">
    @csrf
        <div class="box-body">
            <div class="form-group">
                <input type="hidden" name="id_usuario" value="{{ $usu->id_usuario }}">
                <label>Funcionário</label>
                <select class="form-control" name="id_func" value>
                @foreach($funcionario as $func)
                <option value="{{ $func->id_func }}">{{$func->nome_func}}</option>
                @endforeach 
                </select>
            </div>
        
            <div class="form-group">
                <label>E-mail</label>
                <input type="email" class="form-control" name="email" value="{{ $usu->email }}" placeholder="Descreva o seu email">
            </div>

            <div class="form-group">
                <label>Login</label>
                <input type="text" class="form-control" name="login" value="{{ $usu->login }}" placeholder="Descreva o seu login">
            </div>

            <div class="form-group">
                <label>Senha</label>
                <input type="password" class="form-control" value="{{ $usu->password }}" name="password" placeholder="Descreva a sua senha">
            </div>

            </div>
    
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </div>
    </form>
    @endforeach
@endsection