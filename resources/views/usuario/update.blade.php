@extends('adminlte::page')

@section('content_header')
    <h1>Usuário</h1>
@endsection

@section('content')
   
    @foreach ($usuarios as $usuario)
        <form action="updated" method="POST">
            @csrf
            <div class="box-body">
                <input type="hidden" name="id_usuario" value="{{ $usuario->id_usuario }}">

                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" class="form-control" name="email" value="{{ $usuario->email }}" placeholder="Descreva o seu email">
                </div>

                <div class="form-group">
                    <label>Login</label>
                    <input type="text" class="form-control" name="login" value="{{ $usuario->login }}" placeholder="Descreva o seu login">
                </div>

                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" class="form-control" name="password" value="{{ $usuario->password }}"placeholder="Descreva a sua senha">
                </div>

                </div>
        
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="mudarStatusUsuario">Atualizar</button>
                </div>
            </div>
        </form>
    @endforeach
    
@endsection