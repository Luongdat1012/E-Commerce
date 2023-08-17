{{--<x-guest-layout>--}}
{{--    <x-jet-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-jet-authentication-card-logo />--}}
{{--        </x-slot>--}}

{{--        <x-jet-validation-errors class="mb-4" />--}}

{{--        <form method="POST" action="{{ route('register') }}">--}}
{{--            @csrf--}}

{{--            <div>--}}
{{--                <x-jet-label for="name" value="{{ __('Name') }}" />--}}
{{--                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="email" value="{{ __('Email') }}" />--}}
{{--                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="password" value="{{ __('Password') }}" />--}}
{{--                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />--}}
{{--                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />--}}
{{--            </div>--}}

{{--            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())--}}
{{--                <div class="mt-4">--}}
{{--                    <x-jet-label for="terms">--}}
{{--                        <div class="flex items-center">--}}
{{--                            <x-jet-checkbox name="terms" id="terms"/>--}}

{{--                            <div class="ml-2">--}}
{{--                                {!! __('I agree to the :terms_of_service and :privacy_policy', [--}}
{{--                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',--}}
{{--                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',--}}
{{--                                ]) !!}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </x-jet-label>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">--}}
{{--                    {{ __('Already registered?') }}--}}
{{--                </a>--}}

{{--                <x-jet-button class="ml-4">--}}
{{--                    {{ __('Register') }}--}}
{{--                </x-jet-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-jet-authentication-card>--}}
{{--</x-guest-layout>--}}

@extends('front_end.layout.LayoutMain')
@section('title','Đăng ký')
@section('content-main-page')
    <section class="bg0 p-t-20 p-b-116">
        <div class="container">
            <h1 class="text-dark text-uppercase text-center p-b-30">Đăng ký</h1>
            <form action="{{route('register')}}" method="post">
                @csrf
                <div class="flex-column">
                    <div class="bor8 how-pos4-parent col-xl-6 col-10 mx-auto">
                        <input class="cl2 size-116 p-l-62 p-r-30" type="text" name="name" value="{{old('name')}}"
                               placeholder="Tên" autofocus>
                        <i class="fa-solid fa-user how-pos4 pointer-none"></i>
                    </div>
                    @error('name')
                    <small class="form-text text-danger col-xl-6 col-10 mx-auto p-0">
                        {{$message}}
                    </small>
                    @enderror

                    <div class="bor8 m-t-20 how-pos4-parent col-xl-6 col-10 mx-auto">
                        <input class="cl2 size-116 p-l-62 p-r-30" type="email" name="email" value="{{old('email')}}"
                                placeholder="Email">
                        <i class="fa-solid fa-envelope how-pos4 pointer-none"></i>
                    </div>
                    @error('email')
                    <small class="form-text text-danger col-xl-6 col-10 mx-auto p-0">
                        {{$message}}
                    </small>
                    @enderror

                    <div class="bor8 m-t-20 how-pos4-parent col-xl-6 col-10 mx-auto">
                        <input class="cl2 size-116 p-l-62 p-r-30" type="password" name="password"
                               autocomplete="new-password" placeholder="Mật khẩu">
                        <i class="fa-solid fa-key how-pos4 pointer-none"></i>
                    </div>
                    @error('password')
                    <small class="form-text text-danger col-xl-6 col-10 mx-auto p-0">
                        {{$message}}
                    </small>
                    @enderror

                    <div class="bor8 m-t-20 how-pos4-parent col-xl-6 col-10 mx-auto">
                        <input class="cl2 size-116 p-l-62 p-r-30" type="password" name="password_confirmation"
                               autocomplete="new-password"
                               placeholder="Xác nhận mật khẩu">
                        <i class="fa-solid fa-key how-pos4 pointer-none"></i>
                    </div>
                    @error('password_confirmation')
                    <small class="form-text text-danger col-xl-6 col-10 mx-auto p-0">
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="account-login-btn m-b-20 col-xl-6 mx-auto px-0 p-t-15">
                    <button type="submit" class="account-login-btn-login d-block w-full bor14">Đăng ký</button>
                </div>
            </form>
        </div>
    </section>
@endsection
