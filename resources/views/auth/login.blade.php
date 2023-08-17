{{--<x-guest-layout>--}}
{{--    <x-jet-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-jet-authentication-card-logo />--}}
{{--        </x-slot>--}}

{{--        <x-jet-validation-errors class="mb-4" />--}}

{{--        @if (session('status'))--}}
{{--            <div class="mb-4 font-medium text-sm text-green-600">--}}
{{--                {{ session('status') }}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <form method="POST" action="{{ route('login') }}">--}}
{{--            @csrf--}}

{{--            <div>--}}
{{--                <x-jet-label for="email" value="{{ __('Email') }}" />--}}
{{--                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="password" value="{{ __('Password') }}" />--}}
{{--                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />--}}
{{--            </div>--}}

{{--            <div class="block mt-4">--}}
{{--                <label for="remember_me" class="flex items-center">--}}
{{--                    <x-jet-checkbox id="remember_me" name="remember" />--}}
{{--                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                @if (Route::has('password.request'))--}}
{{--                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
{{--                        {{ __('Forgot your password?') }}--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                <x-jet-button class="ml-4">--}}
{{--                    {{ __('Log in') }}--}}
{{--                </x-jet-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-jet-authentication-card>--}}
{{--</x-guest-layout>--}}
@extends('front_end.layout.LayoutMain');
@section('title','Đăng nhập');
@section('content-main-page')
    <section class="bg0 p-t-20 p-b-116">
        <div class="container">
            <h1 class="text-dark text-uppercase text-center p-b-30">Đăng Nhập</h1>
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="flex-column">
                    <div class="bor8 how-pos4-parent col-xl-6 col-10 mx-auto">
                        <input class="cl2 size-116 p-l-62 p-r-30" type="email" name="email" placeholder="Email">
                        <i class="fa-solid fa-envelope how-pos4 pointer-none"></i>
                    </div>
                    @error('email')
                    <small class="form-text text-danger col-xl-6 col-10 mx-auto p-0">
                        {{$message}}
                    </small>
                    @enderror


                    <div class="bor8 m-t-20 how-pos4-parent col-xl-6 col-10 mx-auto">
                        <input class="cl2 size-116 p-l-62 p-r-30" type="password" name="password"
                               placeholder="Mật khẩu">
                        <i class="fa-solid fa-key how-pos4 pointer-none"></i>
                    </div>
                    @error('password')
                    <small class="form-text text-danger col-xl-6 col-10 mx-auto p-0">
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="account-login-forgot-pw m-b-40 col-xl-6 col-10 mx-auto px-0 p-t-15">
                    <div class="re-pw d-inline-block float-left">
                        <input type="checkbox" name="remember" class="d-inline-block" id="remember-password"/>
                        <label for="remember-password" class="d-inline-block fs-16">Ghi nhớ mật khẩu</label>
                    </div>
                    <a href="{{route('password.request')}}" class="text-dark d-inline-block float-r fs-16"> Quên mật khẩu
                        ? </a>
                </div>
                <div class="account-login-btn m-t-30 col-xl-6 col-10 mx-auto px-0 ">
                    <button type="submit" class="account-login-btn-login d-block w-full bor14">Đăng nhập</button>
                </div>
            </form>
            <div class="col-xl-6 col-10 mx-auto px-0 text-center m-t-30 fs-18">
                <p>Bạn chưa có tài khoản? <a class="text-dark " href="{{'register'}}"> <u>Đăng ký</u> </a></p>
            </div>
        </div>
    </section>
@endsection
