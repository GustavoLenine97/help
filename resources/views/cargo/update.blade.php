@extends('adminlte::page')

@section('content')
   
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Cargo</h3><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/cargo">Cargo Home</a></li>
                        <li class="breadcrumb-item active"><a href=/cargo/atualizar>Atualizar</a></li>
                        <li class="breadcrumb-item active">Formulário Atualizar Cargo</li>
                    </ol>
                </div>
            </div>

            @foreach ($cargo as $car)
            <form action="updated" method="POST">
                @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="id_cargo" value="{{ $car->id_cargo }}">
                            <label>Nome do Cargo</label>
                            <input type="text" class="form-control" name="cargo" value={{ $car->cargo}} placeholder="Descreva o nome do Local">
                        </div>
                
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </div>

@endsection
