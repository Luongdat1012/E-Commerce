<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('assets/images/icons/favicon.png')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/fontawesome-free-6.1.2-web/css/all.min.css')}}"/>
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/fonts/iconic/css/material-design-iconic-font.min.css')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/linearicons-v1.0.0/icon-font.min.css')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/animate/animate.css')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/css-hamburgers/hamburgers.min.css')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/animsition/css/animsition.min.css')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/select2/select2.min.css')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/daterangepicker/daterangepicker.css')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/slick/slick.css')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/MagnificPopup/magnific-popup.css')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/perfect-scrollbar/perfect-scrollbar.css')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/OwlCarousel2/css/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/vendor/OwlCarousel2/css/owl.theme.default.min.css')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{asset('assets/vendor/toastr/toastr.min.css')}}">
    <!--===============================================================================================-->
    <link href="{{asset('assets\libs\sweetalert2\sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/util.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main-child.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css')}}"/>
    <!--===============================================================================================-->

    @livewireStyles
</head>
<body class="animsition" id="home-body">
<!-- Header -->
@include('front_end.layout.Header')
<!-- Button trigger modal -->

<!-- Cart -->
@include('front_end.layout.Cart')

<!-- Main Content -->
@yield('content-main-page')

<!-- Footer -->
@include('front_end.layout.Footer')

<script>
    window.addEventListener('showPopup', event => {
        $(`#home-body`).prepend(event.detail);
    })

    window.addEventListener('goToLogin', event => {
        Swal.fire({
            title: 'Đăng nhập',
            text: 'Bạn phải đăng nhập để thanh toán',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Tôi đồng ý!'
        }).then((result) => {
            console.log(1)
            if (result.isConfirmed) {
                Livewire.emit('goToLogin')
            }
        })
    })
</script>


<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
      <i class="zmdi zmdi-chevron-up"></i>
    </span>
</div>

<!--===============================================================================================-->
<script src="{{asset('assets/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/vendor/OwlCarousel2/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/OwlCarousel-custom.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/vendor/slick/slick.min.js')}}"></script>
<script src="{{asset('assets/js/slick-custom.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/vendor/isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/vendor/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets\libs\sweetalert2\sweetalert2.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assets/vendor/toastr/toastr.min.js')}}"></script>
<script>

</script>
{!! Toastr::message() !!}
<!--===============================================================================================-->
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/js/ajax.js')}}"></script>

@livewireScripts
@yield('custom-scrip')
</body>

</html>
