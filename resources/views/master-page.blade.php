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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Site CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script> --}}


</head>

<body>

    <!-- Navigation Bar-->
    @include('layouts.header')
    
    <!-- End Navigation Bar-->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    @if($flash = session('message_success'))
    <div style="margin-top: 30px;" id="flash-message" class="alert alert-success alert-dismissible fade show" role="alert">
        {{$flash }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if($flash = session('message_error'))
    <div id="flash-message" class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$flash}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
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
    <script src="{{ asset('assets/js/common.js') }}"></script>
    {{-- <script src="{{asset('assets/js/app.min.js')}}"></script> --}}
   
</body>

</html>