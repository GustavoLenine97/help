@extends('adminlte::page')

@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Bem vindo
              @php
                $user = Auth::user();
                echo $user['name'];
                // echo $users['employee_id'];
              @endphp 
            </h1><br>
          </div>
          <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
              </ol>
          </div>
      </div>
      
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <a href="chamado/abrirchamado">
            <div class="info-box bg-info">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-plus"></i></span>
              <div class="info-box-content">
                <h4 class="info-box-text">Abrir chamado</h4>
              </div>
            </div>
          </a>
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <a href="chamado/meuschamados">
            <div class="info-box bg-danger">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-list-ul"></i></span>

              <div class="info-box-content">
                <h4 class="info-box-text">Meus chamados</h4>
              </div>
            </div>
          </a>
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <a href="local/fone">
            <div class="info-box bg-success">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-phone"></i></span>

              <div class="info-box-content">
                <h4 class="info-box-text">Lista de Telefones</h4>
              </div>
            </div>
          </a>
        </div>

        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <a href="http://webmail.pmtb.pr.gov.br/">
            <div class="info-box bg-warning elevation-1">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-envelope"></i></span>

              <div class="info-box-content">
                <h4 class="info-box-text">Webmail</h4>
              </div>
            </div>
          </a>
        </div>

        <div class="col-12">
          @if(session()->has('message'))
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
              swal("Você não tem acesso", "", "error");
            </script>
          @endif
        </div>

      </div>
    </div>
  </div>
@endsection