@extends('admin.layout.LayoutAuth')
@section('title','Recoverpw')
@section('content')
    <div class="card-header text-center p-4 bg-primary">
        <h4 class="text-white mb-0 mt-0">ADMIN SHOP LTD</h4>
        <h5 class="text-white font-13 mb-0">Reset Password</h5>
    </div>
    <div class="card-body">
        <form action="#" class="p-2">
            <p class="text-muted text-center mb-4">Enter your email address and we'll send you an email with instructions to reset your password. </p>

            <div class="form-group mb-0">
                <div class="input-group">
                    <input type="password" class="form-control" placeholder="Enter Email">
                    <span class="input-group-append"> <button type="submit" class="btn btn-primary">Reset</button> </span>
                </div>

            </div>
        </form>
    </div>
@endsection

