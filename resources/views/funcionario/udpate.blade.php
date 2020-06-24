@extends('adminlte::page')

@section('content_header')
<h1>Funcionário</h1>
@endsection

@section('content')
   
   <form action="submit" method="POST">
    @csrf
        <div class="box-body">
            <div class="form-group">
                <label>Nome do Funcionario</label>
                <input type="text" class="form-control" name="nome_func" placeholder="Descreva o nome do Local">
            </div>

            <div class="form-group">
                <label>CPF do Funcionario</label>
                <input type="text" class="form-control" name="CPF" placeholder="Descreva o nome do Local">
            </div>

            <div class="form-group">
                <label>Local</label>
                <select class="form-control" name="id_local">
                @foreach($local as $loc)
                <option value="{{ $loc->id_local }}">{{$loc->nome_local}}</option>
                @endforeach 
                </select>
            </div>

            <div class="form-group">
                <label>Cargo</label>
                <select class="form-control" name="id_cargo">
                @foreach($cargo as $car)
                <option value="{{ $car->id_cargo }}">{{$car->cargo}}</option>
                @endforeach 
                </select>
            </div>
    
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </div>
    </form>

@endsection
