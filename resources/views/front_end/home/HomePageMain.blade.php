@extends('front_end.layout.LayoutMain')
@section('title','Home')
@section('content-main-page')
    <!-- Slider -->

    @include('front_end.home.Slider')
    <!-- Product -->
    <livewire:frontend.home.home-product-component/>

    <!-- Banner -->
    @include('front_end.home.Banner')

    <!--Blog-->
    @include('front_end.home.HomeBlogs')

@endsection
@section('custom-scrip ')
    <script>
        const date = new Date();
        const offset = date.getTimezoneOffset();
        console.log(offset);
    </script>

@endsection
