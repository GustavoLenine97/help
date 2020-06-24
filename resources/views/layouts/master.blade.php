<!DOCTYPE html>
  <html>
   <head>
   
    <!--Import materialize.css-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--style sheets section-->
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        @include('topnav')    <!-- include topnav.blade.php-->
        @include('sidenav')   <!-- include sidenav.blade.php-->
        <div class="container"> 
        
            @yield('body-content')  
        </div>
        <!--JavaScript of body for optimized loading-->
        <!-- Jquery cdn-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </script>
    <!-- also get script from the child view -->
    <script>
    @yield('page-script') <!-- to get script from page -->
    </script>

    <script>
        $(#delete).on('show.bs.modal',function(event){
            var button = $(event.relatedTarget)

            var id_chamado = button.data('catid')
            var modal = $(this)

            modal.find('.modal-body #id_chamado').val(id_chamado);
        })
    </script>
   </body>
</html>     