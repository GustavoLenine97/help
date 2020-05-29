@extends('adminlte::page')

@section('content_header')
<h1>SubCategoria </h1>
@endsection

@section('content')
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

