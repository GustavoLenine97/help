@extends('adminlte::page')

@section('content_header')
    <h1>SubCategoria</h1>
@endsection

@section('content')
    <form action="update" method="post">
    @csrf
        <div class="box-body">
            <div class="form-group">
                <label>Escolhe SubCategoria</label>
                <select class="form-control" name="id_subcat">
                    @foreach($subcat as $sub)
                        <option value="{{ $sub->CodigoSubCategoria }}">{{ $sub->DescricaoSubCategoria }}</option>
                    @endforeach
                </select>
            </div>

            <div class="box-body">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </div>
        </div>
    </form>
@stop