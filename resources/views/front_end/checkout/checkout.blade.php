@extends('front_end.layout.LayoutMain')
@section('title','Thanh toán')
@section('content-main-page')
    <div class="container">
        <div class="bread-crumb flex-w p-r-15 p-t-30 p-lr-0-lg">
            <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4"> Thanh toán </span>
        </div>
    </div>

    <livewire:frontend.checkout.checkout-component/>
@endsection
