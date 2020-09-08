@extends('adminlte::page')

@section('content_header')
    <h1>SubCategoria </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="subcategoria/cadastrar">
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-plus"></i></span>
                    <div class="info-box-content">
                        <h4>Adicionar subcategoria</h4>
                    </div>
                <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="subcategoria/deletar">
                <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="fa fa-minus-circle"></i></span>
                    <div class="info-box-content">
                        <h4>Remover subcategoria</h4>
                    </div>
                <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="subcategoria/atualizar">
                <div class="info-box bg-blue">
                    <span class="info-box-icon"><i class="fa fa-spinner"></i></span>
                    <div class="info-box-content">
                        <h4>Atualizar subcategoria</h4>
                    </div>
                <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>
    <!-- /.col -->
    </div>

    <h2>Todas as subcategorias</h2>

    <div class="row">
        @foreach($subcats as $subcat)
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <a href="" style="color:white"><h3>{{ $subcat->DescricaoSubCategoria }}</h3></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

