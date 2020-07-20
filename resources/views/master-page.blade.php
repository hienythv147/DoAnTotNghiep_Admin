<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Đồ án tốt nghiệp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    @yield('css')
    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
</head>

<body>

    <!-- Navigation Bar-->
    @include('layouts.header')
    
    <!-- End Navigation Bar-->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="wrapper">
        <div class="container-fluid">
            @yield('page-content')
        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

    {{-- Footer --}}
    @include('layouts.footer')
 
    <div class="rightbar-overlay"></div>
    <!-- Vendor js -->
    <script src="{{asset('assets/js/vendor.min.js')}}"></script>
    @yield('script')
    <!-- App js-->
    {{-- <script src="{{asset('assets/js/app.min.js')}}"></script> --}}
    {{-- SweetAlert --}}
   
</body>

</html>