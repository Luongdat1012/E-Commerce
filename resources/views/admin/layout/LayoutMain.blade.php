<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>
        @yield('title')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta content="Responsive bootstrap 4 admin template" name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets\images\favicon.ico')}}"/>

    <!-- Dropzone Css -->
    <link rel="stylesheet" href="{{asset('assets\libs\dropzone\dropzone.min.css')}}" type="text/css"/>

    <!-- App css -->
    <link href="{{asset('assets\libs\custombox\custombox.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets\css\bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet"/>
    <link href="{{asset('assets\css\icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets\css\app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/fontawesome-free-6.1.2-web/css/all.min.css')}}"/>
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}"/>

    <!-- Sweet Alert 2 Css -->
    <link href="{{asset('assets\libs\sweetalert2\sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets\libs\slideon-main\slideon.css')}}" rel="stylesheet" type="text/css"/>

{{--    <link href="{{asset('assets\css\util.css')}}" rel="stylesheet" type="text/css"/>--}}

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('assets\css\custom.css')}}">

    <!-- JQuery -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>

    @livewireStyles

</head>

<body>
<!-- Begin page -->
<div id="wrapper">
    <!-- Topbar Start -->
@include('admin.layout.Header')
<!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
@include('admin.layout.Menu')

<!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid pt-3">
                @yield('content-main-page')
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end content -->

        <!-- Footer Start -->
    @include('admin.layout.Footer')
    <!-- end Footer -->
    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
@include('admin.layout.SettingMode')
<!-- /Right-bar -->

<!-- Vendor js -->
<script src="{{asset('assets\js\vendor.min.js')}}"></script>
<script src="{{asset('assets\libs\moment\moment.min.js')}}"></script>
<script src="{{asset('assets\libs\jquery-scrollto\jquery.scrollTo.min.js')}}"></script>

<!-- Ckeditor js -->
<script src="{{asset('assets\libs\ckeditor\ckeditor.js')}}"></script>

<!-- Plugin js-->
<script src="{{asset('assets\libs\parsleyjs\parsley.min.js')}}"></script>
<script src="{{asset('assets\libs\switchery\switchery.min.js')}}"></script>

<!-- Validation init js-->
<script src="{{asset('assets\js\pages\form-validation.init.js')}}"></script>

<!-- Chat app -->
<script src="{{asset('assets\js\pages\jquery.chat.js')}}"></script>

<!-- Todo app -->
<script src="{{asset('assets\js\pages\jquery.todo.js')}}"></script>

<!-- Dashboard init JS -->
<script src="{{asset('assets\js\pages\dashboard.init.js')}}"></script>

<!-- Sweet alert init js-->
<script src="{{asset('assets\libs\sweetalert2\sweetalert2.js')}}"></script>

<!-- Dropzone Js -->
<script src="{{asset('assets\libs\dropzone\dropzone.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets\libs\custombox\custombox.min.js')}}"></script>
<script src="{{asset('assets\libs\slideon-main\slideon.js')}}"></script>

<script src="{{asset('assets\js\app.min.js')}}"></script>
@yield('scrip-custom')

@livewireScripts
</body>

</html>
