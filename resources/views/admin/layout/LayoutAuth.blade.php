<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets\images\favicon.ico">

    <!-- App css -->
    <link href="{{asset('assets\css\bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
    <link href="{{asset('assets\css\icons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets\css\app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet">

</head>

<body class="authentication-page">

<div class="account-pages my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card mt-4">
                    @yield('content')

                    <!-- end card-body -->
                </div>
                <!-- end card -->

                <!-- end row -->

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
</div>

<!-- Vendor js -->
<script src="{{asset('assets\js\vendor.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets\js\app.min.js')}}"></script>

</body>

</html>
