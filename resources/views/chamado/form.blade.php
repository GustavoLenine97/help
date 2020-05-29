@extends('adminlte::page')

@section('content_header')
<h1>Chamado</h1>
@endsection

@section('content')
   
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
    
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
                <select class="form-control input-sm" id="subcategory">
                <option value=""></option>
                </select>
            </div>
    
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </div>
    </form>

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

