@extends('adminlte::page')

@section('content_header')
    <h1>Cargo</h1>
@endsection

@section('content')
    <form action="delete" method="post">
    @csrf
        <div class="box-body">
            <div class="form-group">
                <label>Deletar Cargo</label>
                <select class="form-control" name="id_cargo">
                    @foreach($cargo as $car)
                        <option value="{{ $car->id_cargo }}">{{ $car->cargo }}</option>
                    @endforeach
                </select>
            </div>

            <div class="box-body">
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            </div>
        </div>
    </form>
@stop