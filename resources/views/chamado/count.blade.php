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
        
        @foreach ($chamado as $cha)
            <div class="col-lg-3 col-xs-6" onload="myFunction();">
                <div class="info-box bg-green">
                    <div class="info-box-content">
                        <h4>{{ $cha->name }}</h4>
                    </div>
                    <span class="info-box-icon">
                        {{ $quantidade }}
                    </span>
                </div>
            </div>
        @endforeach
    </div>

@endsection

@section('js')
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript" >
    $('#count').on('change',function(e){
        console.log(e);

        var cat_id = e.target.value;

        var ola = document.getElementById('count').innerHTML;

        alert(ola);

        $.get('/ajax-count/' + cat_id , function(data){
            $('#subcategory').empty();
            $.each(data, function(form, subcatObj){
                $('#subcategory').append('<option value="'+subcatObj.id_user+'">'+subcatObj.id_user+'</option>');
            });
        });
    });
    </script>
@endsection

