@extends('adminlte::page')

@section('content_header')
<h1>Categoria</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="categoria/cadastrar">
            <div class="info-box bg-blue">
                <span class="info-box-icon"><i class="fa fa-plus"></i></span>
                <div class="info-box-content">
                    <h4>Adicionar nova categoria</h4>
                </div>
            <!-- /.info-box-content -->
            </div>
        </a>
        <!-- /.info-box -->
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="categoria/deletar">
            <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-minus-circle"></i></span>
                <div class="info-box-content">
                    <h4>Remover categoria</h4>
                </div>
            <!-- /.info-box-content -->
            </div>
        </a>
        <!-- /.info-box -->
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="categoria/atualizar">
            <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-level-up"></i></span>
                <div class="info-box-content">
                    <h4>Atualizar categoria</h4>
                </div>
            <!-- /.info-box-content -->
            </div>
        </a>
        <!-- /.info-box -->
    </div>

<!-- /.col -->
</div>
<h2>Todas as Categorias</h2>
<div class="row">

<!--
<table class="table no-margin">
    <thead>
    <tr>
    <th>Codigo Categoria</th>
    <th>DescricaoCategoria</th>
    <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cats as $cat)
    <tr>
    <td><a href="pages/examples/invoice.html">{{ $cat->CodigoCategoria }}</a></td>
    <td>{{ $cat->DescricaoCategoria }}</td>
    <td><span class="label label-success">{{ $cat->AtivoCategoria }}</span></td>
    </tr>
    @endforeach
    </tbody>
</table>
-->

@foreach($cats as $cat)
<div class="col-lg-3 col-xs-6">
    <div class="small-box bg-green">
        <div class="inner">
            <a href="categoria/{{ $cat->DescricaoCategoria }}/subcategoria" style="color:white"><h3>{{ $cat->DescricaoCategoria }}</h3></a>
        </div>
    </div>
</div>
@endforeach


</div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
