@extends('adminlte::page')

@section('content_header')
    <h1>Categoria</h1>
@endsection

@section('content')
    
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="categoria/cadastrar">
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-plus"></i></span>
                    <div class="info-box-content">
                        <h4>Adicionar categoria</h4>
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
                <div class="info-box bg-blue">
                    <span class="info-box-icon"><i class="fa fa-spinner"></i></span>
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
        <div class="col-lg-3 col-xs-6">
            <div class="info-box bg-green">
                <div class="info-box-content">
                    <h3>
                    @foreach ($count as $item)
                        {{ $item->DescricaoCategoria }}
                    @endforeach
                    </h3>
                </div>
                <span class="info-box-icon">{{ $countts}}</span>
            </div>
        </div>
    </div>

@endsection
