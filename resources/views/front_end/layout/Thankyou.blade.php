@extends('front_end.layout.LayoutMain')
@section('title','Thank you')
@section('content-main-page')
    <div class="jumbotron text-center bg-none">
        <h1 class="display-3">Thank You!</h1>
        <p class="lead"><strong>Please check your email</strong> for further instructions on how to complete your account setup.</p>
        <hr>
        <p>
            Having trouble? <a href="https://bootstrapcreative.com/">Contact us</a>
        </p>
        <p class="lead py-4">
            <a class="btn btn-primary btn-xl" href="{{route('homePage')}}" role="button">Continue to homepage</a>
        </p>
    </div>
@endsection
