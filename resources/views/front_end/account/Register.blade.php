@extends('front_end.layout.LayoutMain')
@section('title','Đăng ký')
@section('content-main-page')
    <section class="bg0 p-t-20 p-b-116">
        <div class="container">
            <h1 class="text-dark text-uppercase text-center p-b-30">Đăng ký</h1>
            <div class="flex-column">
                <div class="bor8 m-b-20 how-pos4-parent col-xl-6 col-10 mx-auto">
                    <input class="cl2 size-116 p-l-62 p-r-30" type="text" name="first_name" placeholder="Tên">
                    <i class="fa-solid fa-user how-pos4 pointer-none"></i>
                </div>
                <div class="bor8 m-b-20 how-pos4-parent col-xl-6 col-10 mx-auto">
                    <input class="cl2 size-116 p-l-62 p-r-30" type="text" name="last_name" placeholder="Họ">
                    <i class="fa-solid fa-user how-pos4 pointer-none"></i>
                </div>
                <div class="bor8 m-b-20 how-pos4-parent col-xl-6 col-10 mx-auto">
                    <input class="cl2 size-116 p-l-62 p-r-30" type="tel" name="phone" placeholder="Số điện thoại">
                    <i class="fa-solid fa-phone how-pos4 pointer-none"></i>
                </div>
                <div class="bor8 m-b-20 how-pos4-parent col-xl-6 col-10 mx-auto">
                    <input class="cl2 size-116 p-l-62 p-r-30" type="email" name="email" placeholder="Email">
                    <i class="fa-solid fa-envelope how-pos4 pointer-none"></i>
                </div>
                <div class="bor8 m-b-20 how-pos4-parent col-xl-6 col-10 mx-auto">
                    <input class="cl2 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Mật khẩu">
                    <i class="fa-solid fa-key how-pos4 pointer-none"></i>
                </div>
                <div class="bor8 m-b-20 how-pos4-parent col-xl-6 col-10 mx-auto">
                    <input class="cl2 size-116 p-l-62 p-r-30" type="password" name="confirm_password"
                           placeholder="Xác nhận mật khẩu">
                    <i class="fa-solid fa-key how-pos4 pointer-none"></i>
                </div>
            </div>
            <div class="account-login-btn m-b-20 col-xl-6 mx-auto px-0 ">
                <a href="#" class="account-login-btn-login d-block w-full bor14">Đăng ký</a>
            </div>
        </div>
    </section>
@endsection


