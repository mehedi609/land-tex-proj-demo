<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Land Tex Project Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('fontawesome/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('backend/css/sb-admin.min.css')}}" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.html">Admin Panel</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      @include('backend.includes.sidebar')

      <div id="content-wrapper">

        <div class="container-fluid">

          @yield('content')

        </div>
        <!-- /.container-fluid -->

        {{--<!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2019</span>
            </div>
          </div>
        </footer>--}}

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    @include('sweetalert::alert')
    <script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Page level plugin JavaScript-->
    <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('backend/js/sb-admin.min.js')}}"></script>

    @yield('script')


  </body>

</html>


{{--
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/sidebar-styles.css')}}">
    <title>Land TEX Project</title>
  </head>
  <body>
    --}}
{{--<div class="container-fluid p-0">

      <!-- Bootstrap row -->
      <div class="row" id="body-row">
        <!-- MAIN -->
        <div class="col">
          <!-- Sidebar -->
          @include('backend.includes.sidebar')

          <!-- Main Content -->
          @yield('content')

        </div><!-- Main Col END -->

      </div><!-- body-row END -->

    </div><!-- container -->--}}{{--


    <div class="container-fluid p-0">

      <!-- Bootstrap row -->
      <div class="row" id="body-row">
        <!-- Sidebar -->
        @include('backend.includes.sidebar')
        <!-- sidebar-container END -->

        <!-- MAIN -->
        <div class="col">
          @yield('content')
        </div><!-- Main Col END -->

      </div><!-- body-row END -->


    </div><!-- container -->

    @include('sweetalert::alert')
    <script src="{{asset('js/jquery.slim.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/sidebar.js')}}"></script>
  </body>
</html>
--}}
