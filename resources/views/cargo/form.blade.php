@extends('adminlte::page')

@section('content_header')
    <h1>Cargo</h1>
@endsection

@section('content')
   
   <form action="submit" method="POST">
    @csrf
        <div class="box-body">
            <div class="form-group">
                <label>Nome do Cargo</label>
                <input type="text" class="form-control" name="cargo" placeholder="Descreva o nome do Local">
            </div>
    
            <div class="form-group">
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </div>
    </form>

@endsection
