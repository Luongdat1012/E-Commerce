@extends('front_end.layout.LayoutMain')
@section('title','Category')
@section('content-main-page')
    <div class="container product p-t-20 text-center">
        <div class="flex-w flex-sb-m">
        <!-- breadcrumb -->
            <div class="bread-crumb flex-w">
                <a href="{{route('homePage')}}" class="stext-118 cl8 hov-cl1 trans-04">
                    Home
                    <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                </a>
                @foreach($listParentCategory as $item)
                    @if($listParentCategory->last()->id != $item->id)
                        <a href="{{route('productsCategory',$item->slug)}}" class="stext-118 cl8 hov-cl1 trans-04">
                            {{$item->category_name}}
                            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                        </a>
                    @endif
                @endforeach

                <span class="stext-118 cl4"> {{$listParentCategory->last()->category_name}} </span>
            </div>

            @include('front_end.product.ProductFilter')
        </div>
        <div class="product row">
            {{--  Item Product --}}
            @foreach($products as $product)
                <div class="item col-lg-3 col-md-4 col-sm-6 col-xs-12 p-b-35">
                    <div class="block2">
                        <div class="block2-pic hov-img1 product-shadow rounded">
                            <img src="{{asset('uploads') . '/' .$product->photo}}" class="product-thumb"
                                 alt="IMG-PRODUCT"/>
                            <a href="#"
                               class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1"
                               onclick="loadQuickProduct({{$product->id}})" id="product_quick_{{$product->id}}">Xem
                                nhanh</a>
                        </div>
                        <div class="block2-txt d-flex flex-nowrap flex-t p-t-14">
                            <div class="block2-txt-child1 d-flex align-items-center flex-column">
                                <a href="{{route('productDetail',$product->slug)}}"
                                   class="mtext-105 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 text-center fs-25">
                                    {{$product->name}}
                                </a>
                                <div class="stext-105 cl3">
                                    <span
                                        class="normal-price fs-18 {{$product->discount_number ? 'special-price' : 'discount'}} "> {{showPrice($product->price)}}₫ </span>
                                    @if($product->discount_price)
                                        <span class="special-price"> {{showPrice($product->price, $product->discount_price)}}₫ </span>
                                    @endif
                                </div>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3 fs-25">
                                <button type="button"
                                        class="btn-addwish-b2 active dis-block pos-relative js-addwish-b2">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <div class="discount-number">
                            -{{$product->discount_number}}%
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <section class="bg0 p-b-30 text-center">
        <div class="flex-c-m flex-w w-full p-t-25">
            <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                Load More
            </a>
        </div>
    </section>
@endsection

@section('custom-scrip')

@endsection

