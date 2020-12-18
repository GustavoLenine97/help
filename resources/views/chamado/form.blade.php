@extends('adminlte::page')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Abrir chamado</h1><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Abrir Chamado</li>
                    </ol>
                </div>
            </div>
        
            <form action="submit" method="POST">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label>Escolha a Categoria</label>
                        <select class="form-control input-sm" name="category" id="category">
                            @foreach($categoria as $cat)
                                <option value="{{ $cat->CodigoCategoria }}">{{$cat->DescricaoCategoria }}</option>
                            @endforeach 
                        </select>
                    </div>
        
                    <div class="form-group">
                        <label>Escolha a SubCategoria</label>
                        <select class="form-control input-sm" id="subcategory" name="subcategory">
                        <option value=""></option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Descreva o problema</label>
                        <textarea class="form-control" name="descricao" rows="3" placeholder=" "></textarea>
                    </div>
        
                    <!-- Button trigger modal -->
                    <button type="submit" class="btn btn-primary">
                        Abrir um chamado
                    </button>
                </div>
            </form>
        </div>
    </div>
    <br>
    
    @if(session()->has('message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Acesso negado!</strong> Apenas o adminstrador tem acesso.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    @endif

    @if(session()->has('success'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Acesso negado!</strong> Apenas o adminstrador tem acesso.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    @endif

@endsection

@section('js')
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript" >
    $('#category').on('change',function(e){
        console.log(e);

        var cat_id = e.target.value;

        $.get('/ajax-subcat?cat_id=' + cat_id , function(data){
            $('#subcategory').empty();
            $.each(data, function(form, subcatObj){
                $('#subcategory').append('<option value="'+subcatObj.CodigoSubCategoria+'">'+subcatObj.DescricaoSubCategoria+'</option>');
            });
        });
    });
    </script>   
@endsection