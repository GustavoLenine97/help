@extends('adminlte::page')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Categoria</h3><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/categoria">Categoria Home</a></li>
                        <li class="breadcrumb-item active">Atualizar</li>
                    </ol>
                </div>
            </div>

            <form action="update" method="post">
            @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label>Atualizar Categoria</label>
                        <select class="form-control" name="id_cat" id="">
                            @foreach($categoria as $cat)
                                <option value="{{ $cat->CodigoCategoria }}">{{ $cat->DescricaoCategoria }}</option>
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
        </div>
    </div>

@stop