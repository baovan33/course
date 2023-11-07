<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{$pageTitle}} - BVA</title>

    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">

{{--{{asset('backend/')}}--}}
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
   @include('parts.backend.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
           @include('parts.backend.header')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
               @include('parts.backend.page_title')

                <!-- Content Row -->

                  @yield('content')


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
       @include('parts.backend.footer')
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
@include('parts.backend.logout_modal')

<!-- Bootstrap core JavaScript-->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{--<script src="{{asset('backend/plugins/ckeditor5/ckeditor.js')}}"></script>--}}
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

@yield('scripts')


<!-- Custom scripts for all pages-->
<script src="{{asset('backend/js/sb-admin-2.min.js')}}"></script>

{{--<script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>--}}
<script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
{{--<script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>--}}



{{--<!-- Page level plugins -->--}}
{{--<script src="{{asset('backend/vendor/chart.js/Chart.min.js')}}"></script>--}}

{{--<!-- Page level custom scripts -->--}}
{{--<script src="{{asset('backend/js/demo/chart-area-demo.js')}}"></script>--}}
{{--<script src="{{asset('backend/js/demo/chart-pie-demo.js')}}"></script>--}}

</body>

</html>
