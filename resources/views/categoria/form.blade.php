@extends('adminlte::page')

@section('content_header')
<h1>Categoria</h1>
@endsection

@section('content')
   
   <form action="submit" method="POST">
    @csrf
        <div class="box-body">
            <div class="form-group">
                <label>Nome da Categoria</label>
                <input type="text" class="form-control" name="DescricaoCategoria" placeholder="Descreva o nome da Categoria">
            </div>
            <div class="form-group">
                <select class="form-control">
                    <option>1</option>
                    <option>2</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit Data</button>
            </div>
        </div>
    </form>

@endsection
