@extends('adminlte::page')

@section('content')
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Local</h3><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/local">Local Home</a></li>
                        <li class="breadcrumb-item active">Deletar</li>
                    </ol>
                </div>
            </div>

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
        </div>
    </div>

@endsection