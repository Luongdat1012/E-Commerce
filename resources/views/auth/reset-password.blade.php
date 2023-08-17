{{--<x-guest-layout>--}}
{{--    <x-jet-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-jet-authentication-card-logo />--}}
{{--        </x-slot>--}}

{{--        <x-jet-validation-errors class="mb-4" />--}}

{{--        <form method="POST" action="{{ route('password.update') }}">--}}
{{--            @csrf--}}

{{--            <input type="hidden" name="token" value="{{ $request->route('token') }}">--}}

{{--            <div class="block">--}}
{{--                <x-jet-label for="email" value="{{ __('Email') }}" />--}}
{{--                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="password" value="{{ __('Password') }}" />--}}
{{--                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />--}}
{{--                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <x-jet-button>--}}
{{--                    {{ __('Reset Password') }}--}}
{{--                </x-jet-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-jet-authentication-card>--}}
{{--</x-guest-layout>--}}
@extends('front_end.layout.LayoutMain');
@section('title','Thay đổi mật khẩu');
@section('content-main-page')

    <section class="bg0 p-t-20 p-b-116">
        <div class="container">
            <h1 class="text-dark text-uppercase text-center p-b-30">Thay đổi mật khẩu</h1>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="flex-column">
                    <div class="bor8 how-pos4-parent col-xl-6 col-10 mx-auto">
                        <input class="cl2 size-116 p-l-62 p-r-30" type="email" name="email" value="{{$request->email}}" >
                        <i class="fa-solid fa-envelope how-pos4 pointer-none"></i>
                    </div>
                    @error('email')
                    <small class="form-text text-danger col-xl-6 col-10 mx-auto p-0">
                        {{$message}}
                    </small>
                    @enderror
                    <div class="bor8 m-t-20 how-pos4-parent col-xl-6 col-10 mx-auto">
                        <input class="cl2 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Mật khẩu mới">
                        <i class="fa-solid fa-key how-pos4 pointer-none"></i>
                    </div>
                    @error('password')
                    <small class="form-text text-danger col-xl-6 col-10 mx-auto p-0">
                        {{$message}}
                    </small>
                    @enderror
                    <div class="bor8 m-tb-20 how-pos4-parent col-xl-6 col-10 mx-auto">
                        <input class="cl2 size-116 p-l-62 p-r-30" type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu mới">
                        <i class="fa-solid fa-key how-pos4 pointer-none"></i>
                    </div>
                    @error('password_confirmation')
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
