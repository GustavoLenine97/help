@extends('adminlte::page')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Funcionário</h3><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/funcionario">Funcionário Home</a></li>
                        <li class="breadcrumb-item active">Cadastrar</li>
                    </ol>
                </div>
            </div>

            <form action="submit" method="POST">
            @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label>Nome do Funcionario</label>
                        <input type="text" class="form-control" name="nome_func" placeholder="Descreva o nome do Funcionário">
                    </div>

                    <div class="form-group">
                        <label>CPF do Funcionario</label>
                        <input type="text" class="form-control" name="CPF" id="CPF"  placeholder="Descreva o CPF do Funcionário">
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
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

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