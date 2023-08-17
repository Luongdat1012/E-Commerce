@extends('front_end.layout.LayoutMain')
@section('title','Customer order')
@section('content-main-page')
    <div class="bg0 m-t-23 p-b-140">
        <div class="container">
            <div class="flex-w flex-sb-m">
                <!-- breadcrumb -->
                <div class="bread-crumb flex-w">
                    <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
                        Home
                        <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                    </a>
                    <span class="stext-109 cl4"> Account </span>
                </div>
            </div>
            <div class="row">
                @yield('customer-content')
{{--@dd(!(Route::currentRouteName() == 'user.account'))--}}
                <div class="col-sm-12 col-md-3 col-lg-3 acc-menu">
                    <h3 class="p-tb-30 text-dark">Xin chào <span>Lương Đạt</span></h3>
                    <div class="account-user w-full">
                        <div class="account-user-item flex-sb fs-16 m-tb-20 {{!(Route::currentRouteName() == 'user.account') ?: 'active'}}">
                            <a class="text-dark" href="">Tài khoản</a>
                            <i class="fa-solid fa-fingerprint fs-24 text-dark"></i>
                        </div>
                        <div class="account-user-item flex-sb fs-16 m-tb-20 {{!(Route::currentRouteName() == 'user.order') ?: 'active'}}">
                            <a class="text-dark" href="{{route('user.order')}}">Lịch sử đơn hàng</a>
                            <i class="fa-solid fa-bag-shopping fs-24 text-dark"></i>
                        </div>
                        <div class="account-user-item flex-sb fs-16 m-tb-20 {{!(Route::currentRouteName() == 'user.address') ?: 'active'}}">
                            <a class="text-dark" href="">Địa chỉ giao hàng</a>
                            <i class="fa-solid fa-location-dot fs-24 text-dark"></i>
                        </div>
                        <div class="account-user-item flex-sb fs-16 m-tb-20 {{!(Route::currentRouteName() == 'user.password') ?: 'active'}}">
                            <a class="text-dark" href="">Thay đổi mật khẩu</a>
                            <i class="fa-solid fa-pen-to-square fs-24 text-dark"></i>
                        </div>
                        <div class="account-user-item flex-sb fs-16 m-tb-20 {{!(Route::currentRouteName() == 'user.wishlist') ?: 'active'}}">
                            <a class="text-dark" href="">Sản phẩm yêu thích</a>
                            <i class="fa-solid fa-heart fs-24 text-dark"></i>
                        </div>
                        <div class="account-user-item">
                            <a href="#" class="d-block w-full text-center fs-16 account-user-item-logout">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
