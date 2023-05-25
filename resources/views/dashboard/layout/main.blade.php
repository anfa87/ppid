<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="SISTEM INFORMASI PPID DISPORA JABAR">
        <meta name="author" content="Ardi Nurfadilah">

        <title>PPID - @yield('title')</title>

        
        <!-- Bootstrap Core CSS -->
        <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{!! asset('css/metisMenu.min.css') !!}" rel="stylesheet">

        <link href="{!! asset('css/style.css') !!}" rel="stylesheet">

        @yield('css')

        

        <!-- Custom CSS -->
        <link href="{!! asset('css/startmin.css') !!}" rel="stylesheet">

        

        <!-- Custom Fonts -->
        <link href="{!! asset('css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">

        @yield('font')

       
    </head>
    <body>

      <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          @include('dashboard.layout.header')
          @include('dashboard.layout.sidebar')
          
        </nav>
        <div id="page-wrapper">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">@yield('page-header')</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              
              @yield('konten')
             
          </div>
          
          <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper --> 

       
      </div>









      <!-- jQuery -->
      <script src="{!! asset('js/jquery.min.js') !!}"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="{!! asset('js/bootstrap.min.js') !!}"></script>

      <!-- Metis Menu Plugin JavaScript -->
      <script src="{!! asset('js/metisMenu.min.js') !!}"></script>
      
      @yield('javascript')

      <!-- Custom Theme JavaScript -->
      <script src="{!! asset('js/startmin.js') !!}"></script>


      

      @yield('javascript2')

  </body>
</html>