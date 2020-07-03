@extends('adminlte::page')

@section('content_header')
<h1>Local</h1>
@endsection

@section('content')

    <form action="formUpdate" method="POST">
        @csrf
        <div class="form-group">
            <label>Atualizar local</label>
            <select name="id_local" class="form-control">
                @foreach($local as $loc)
                <option value="{{ $loc->id_local}}">{{$loc->nome_local}}</option>
                @endforeach 
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Atualizar</button>
        </div>
    </form>
@endsection