@extends('admin.layout.LayoutAuth')
@section('title','Login')
@section('content')
    <div class="card-header p-4 bg-primary">
        <h4 class="text-white text-center mb-0 mt-0">Login Admin</h4>
    </div>
    <div class="card-body">

        <form action="{{route('admin.loginPost')}}" method="post" class="p-2">
            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif

            @csrf
            <div class="form-group mb-3">
                <label for="emailaddress">Email Address :</label>
                <input class="form-control" name="email" type="email" id="emailaddress" required=""
                       placeholder="abc@gmail.com">
                @error('email')
                <small class="form-text text-danger">
                    {{$message}}
                </small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="password">Password :</label>
                <input class="form-control" name="password" type="password" required="" id="password"
                       placeholder="Enter your password">
                @error('password')
                <small class="form-text text-danger">
                    {{$message}}
                </small>
                @enderror
            </div>


            <div class="form-group mb-4">
                <div class="checkbox checkbox-success">
                    <input id="remember" name="remember" type="checkbox">
                    <label for="remember">
                        Remember me
                    </label>
                    <a href="pages-recoverpw.html" class="text-muted float-right">Forgot your password?</a>
                </div>
            </div>

            <div class="form-group row text-center mt-4 mb-4">
                <div class="col-12">
                    <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Sign In
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
