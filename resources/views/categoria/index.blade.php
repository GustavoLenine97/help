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
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="/categoria/cadastrar">
                        <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="fa fa-plus"></i></span>
                            <div class="info-box-content">
                                <h4>Adicionar categoria</h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="/categoria/deletar">
                        <div class="info-box bg-red">
                            <span class="info-box-icon"><i class="fa fa-minus-circle"></i></span>
                            <div class="info-box-content">
                                <h4>Remover categoria</h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="/categoria/atualizar">
                        <div class="info-box bg-blue">
                            <span class="info-box-icon"><i class="fa fa-spinner"></i></span>
                            <div class="info-box-content">
                                <h4>Atualizar categoria</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
            <h2>Todas as Categorias</h2>
            
            <div class="row">
                @foreach($cats as $cat)
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-white">
                            <div class="inner">
                                <a href="/categoria/{{ $cat->DescricaoCategoria }}/subcategoria" style="color:black">
                                    <h3><i class="fas fa-microchip" style="color:red"></i> {{ $cat->DescricaoCategoria }}</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $cats->links() }}
        </div>
    </div>

@endsection
