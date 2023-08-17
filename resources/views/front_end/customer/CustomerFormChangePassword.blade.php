@extends('front_end.customer.CustomerLayout')
@section('customer-content')
    <div class="col-sm-12 col-md-12 col-lg-9">
        <h1 class="text-dark text-uppercase text-center p-b-30">Đổi mật khẩu</h1>
        <form action="{{route('user.update-password',Auth::id())}}" method="post">
            @csrf
            <section class="bg0 p-t-20 p-b-116">
                <div class="container">
                    <div class="flex-column">
                        <div class="bor8 m-t-20 how-pos4-parent col-xl-6 col-10 mx-auto">
                            <input class="cl2 size-116 p-l-62 p-r-30" type="password" name="currentPassword" placeholder="Mật khẩu hiện tại">
                            <i class="fa-solid fa-key how-pos4 pointer-none"></i>
                        </div>
                        @if(session('error'))
                            <small class="form-text text-danger col-xl-6 col-10 mx-auto p-0">
                                {{session('error')}}
                            </small>
                        @endif
                        @error('currentPassword')
                        <small class="form-text text-danger col-xl-6 col-10 mx-auto p-0">
                            {{$message}}
                        </small>
                        @enderror
                        <div class="bor8 m-t-20 how-pos4-parent col-xl-6 col-10 mx-auto">
                            <input class="cl2 size-116 p-l-62 p-r-30" type="password" name="newPassword" placeholder="Mật khẩu mới">
                            <i class="fa-solid fa-key how-pos4 pointer-none"></i>
                        </div>
                        @error('newPassword')
                        <small class="form-text text-danger col-xl-6 col-10 mx-auto p-0">
                            {{$message}}
                        </small>
                        @enderror
                        <div class="bor8 m-tb-20 how-pos4-parent col-xl-6 col-10 mx-auto">
                            <input class="cl2 size-116 p-l-62 p-r-30" type="password" name="newPassword_confirmation" placeholder="Nhập lại mật khẩu mới">
                            <i class="fa-solid fa-key how-pos4 pointer-none"></i>
                        </div>
                        @error('confirmPassword')
                        <small class="form-text text-danger col-xl-6 col-10 mx-auto p-0">
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="account-login-btn m-b-20 col-xl-6 mx-auto px-0 ">
                        <button type="submit" class="account-login-btn-login d-block w-full bor14">Lưu thay đổi</button>
                    </div>
                </div>
            </section>
        </form>
    </div>

    <!-- Modal -->

@endsection
