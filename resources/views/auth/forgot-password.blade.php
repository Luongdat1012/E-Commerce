{{--<x-guest-layout>--}}
{{--    <x-jet-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-jet-authentication-card-logo />--}}
{{--        </x-slot>--}}

{{--        <div class="mb-4 text-sm text-gray-600">--}}
{{--            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}--}}
{{--        </div>--}}

{{--        @if (session('status'))--}}
{{--            <div class="mb-4 font-medium text-sm text-green-600">--}}
{{--                {{ session('status') }}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <x-jet-validation-errors class="mb-4" />--}}

{{--        <form method="POST" action="{{ route('password.email') }}">--}}
{{--            @csrf--}}

{{--            <div class="block">--}}
{{--                <x-jet-label for="email" value="{{ __('Email') }}" />--}}
{{--                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <x-jet-button>--}}
{{--                    {{ __('Email Password Reset Link') }}--}}
{{--                </x-jet-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-jet-authentication-card>--}}
{{--</x-guest-layout>--}}

@extends('front_end.layout.LayoutMain');
@section('title','Quên mật khẩu');
@section('content-main-page')
    <section class="bg0 p-t-20 p-b-116">
        <div class="container">
            <h1 class="text-dark text-uppercase text-center p-b-30">Quên mật khẩu</h1>
            <form action="{{route('password.email') }}" method="POST">
                @csrf
                <div class="flex-column">
                    <div class="bor8 how-pos4-parent col-xl-6 col-10 mx-auto">
                        <input class="cl2 size-116 p-l-62 p-r-30" type="email" name="email" placeholder="Nhập địa chỉ email">
                        <i class="fa-solid fa-envelope how-pos4 pointer-none"></i>
                    </div>
                    @error('email')
                    <small class="form-text text-danger col-xl-6 col-10 mx-auto p-0">
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="account-login-btn m-t-30 col-xl-6 col-10 mx-auto px-0 ">
                    <button type="submit" class="account-login-btn-login d-block w-full bor14">Xác nhận</button>
                </div>
            </form>
        </div>
    </section>
@endsection
