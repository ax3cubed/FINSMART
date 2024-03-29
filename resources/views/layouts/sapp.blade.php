<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Finsmart</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Favicons -->

        <link rel="icon" href="{{asset('favicon.ico')}}">
        <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
        <!-- Select2 -->
        <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
        <!-- Google Font: Source Sans Pro -->
        <link href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700')}}" rel="stylesheet">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

        <!-- Fonts -->
        <link href="{{asset('https://fonts.googleapis.com/css?family=Nunito:400,600,700')}}" rel="stylesheet">

        {{-- texteditor cdn --}}
        <script src="{{asset('https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js')}}"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
{{-- 
        @livewireStyles --}}

        <!-- Scripts -->
        <script src="{{asset('https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js')}}" defer></script>
        <script type="text/JavaScript">



          function BrWindow(theURL,winName,features) { //v2.0
          
            window.open(theURL,winName,features);
          
          }
          
          
          </script>
         
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            {{-- @livewire('navigation-dropdown')
              nav bar --}}
              @include('inc.snavbar')
              {{-- Side bar --}}
              @include('inc.ssidebar')

              <div class="content-wrapper">
                {{-- messages --}}
                @include('inc.message')
                {{-- body --}}
                @yield('content')
                
              </div>
              <footer class="main-footer">
                <strong>Copyright &copy; 2020 <a href="https://livepetal.com">Livepetal</a></strong>
                All rights reserved.
                {{-- <div class="float-right d-none d-sm-inline-block">
                  <b>Version</b> 1.0
                </div> --}}
              </footer>
        </div>

        {{-- @stack('modals') --}}

        {{-- @livewireScripts --}}
        <!-- jQuery -->
        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
          $.widget.bridge('uibutton', $.ui.button)
        </script>

        <!-- Bootstrap Switch -->
        <script src="{{asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>

        <!-- Bootstrap 4 -->
        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- ChartJS -->
        <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
        <!-- DataTables -->
        <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
        <!-- Sparkline -->
        <script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
        <!-- Select2 -->
        <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
        <!-- JQVMap -->
        <script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
        <script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
        <!-- daterangepicker -->
        <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
        <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
        <!-- Summernote -->
        <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
        <!-- overlayScrollbars -->
        <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('dist/js/adminlte.js')}}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('dist/js/demo.js')}}"></script>
  
        <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
          });
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      </script>
      <script>
//   setInterval(function(){
//   document.getElementById("updatetime").innerHTML = (new Date()).toLocaleTimeString();
// }, 1000);

  </script>
  <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  })
</script>
<script>
  $(document).ready(function(){
      $( ".alert-success" ).fadeIn(400 ).delay( 2000 ).fadeOut(400);
  });
  $(document).ready(function(){
      $( ".alert-danger" ).fadeIn( 300 ).delay( 1000 ).fadeOut(400);        
  });    
</script>

    </body>
</html>
