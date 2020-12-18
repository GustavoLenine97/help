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
                        <li class="breadcrumb-item active"><a href="/usuario/atualizar">Atualizar</a></li>
                        <li class="breadcrumb-item active">Formulário Atualizar Usuário</a></li>
                    </ol>
                </div>
            </div>

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
        </div>
    </div>
    
@endsection