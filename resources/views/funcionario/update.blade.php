@extends('adminlte::page')

@section('content_header')
    <h1>Funcionário</h1>
@endsection

@section('content')
    
    @foreach ($funcionarios as $func)
        <form action="updated" method="POST">
        @csrf
            <div class="box-body">
                <div class="form-group">
                    <input type="hidden" name="id_func" value="{{ $func->id_func }}">
                    <label>Nome do Funcionario</label>
                    <input type="text" class="form-control" name="nome_func" value="{{ $func->nome_func }}" placeholder="Descreva o nome do funcionário">
                </div>

                <div class="form-group">
                    <label>CPF do Funcionario</label>
                    <input type="text" class="form-control" name="CPF" id="CPF" value="{{ $func->CPF }}" placeholder="Descreva o CPF do funcionário">
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
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </div>
        </form>
    @endforeach
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>
    <script>
        $(document).ready(function($){
            $('#CPF').mask("999.999.999-99");
        });
    </script>
@endsection