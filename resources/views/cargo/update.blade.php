@extends('adminlte::page')

@section('content_header')
    <h1>Cargo</h1>
@endsection

@section('content')
   
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

@endsection
