@extends('adminlte::page')

@section('content_header')
    <h1>Local</h1>
@endsection

@section('content')

    <form action="delete" method="POST">
        @csrf
        <div class="form-group">
            <label>Deletar local</label>
            <select class="form-control" name="id_local">
                @foreach($local as $loc)
                    <option value="{{ $loc->id_local}}">{{$loc->nome_local}}</option>
                @endforeach 
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-danger">Deletar</button>
        </div>
    </form>
@endsection