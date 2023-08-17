<section class="bg0 p-t-23 p-b-30 text-center">
    <div class="container product p-t-50">
        <div class="p-b-50">
            <h3 class="ltext-103 cl5">Sản phẩm bán chạy</h3>
            <hr class="bor-b-blue">
        </div>
        <div class="product owl-carousel owl-theme">
            @foreach($products as $product)
                <div class="item">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img1 product-shadow rounded">
                            <img src="{{asset('uploads') . '/' . $product->photo}}" class="product-thumb"
                                 alt="IMG-PRODUCT"/>
{{--                            <a href="#"--}}
{{--                               class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" data-id ='{{$product->id}}'--}}
{{--                               onclick="loadQuickProduct({{$product->id}})" id="product_quick_{{$product->id}}">--}}
{{--                                Xem nhanh--}}
{{--                            </a>--}}
                            <a href="#"
                               class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" data-id ='{{$product->id}}'
                               onclick="alo()" id="product_quick_{{$product->id}}">
                                Xem nhanh
                            </a>
                        </div>
                        <div class="block2-txt d-flex flex-nowrap flex-t p-t-14">
                            <div class="block2-txt-child1 d-flex align-items-center flex-column">
                                <a href="{{route('productDetail',$product->slug)}}"
                                   class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 text-center">
                                    {{$product->name}}
                                </a>
                                <div class="stext-105 cl3">
                                    @if($product->discount_number != 0)
                                        <span class="normal-price discount"> {{number_format($product->price)}}₫</span>
                                    @endif
                                    <span
                                        class="special-price">{{number_format($product->price - ($product->price * $product->discount_number)/100)}}₫</span>
                                </div>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <button type="button"
                                        class="btn-addwish-b2 active dis-block pos-relative js-addwish-b2">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <div class="discount-number">
                            {{$product->discount_number}} %
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
{{--    <div class="container product p-t-50">--}}
{{--        <div class="p-b-50">--}}
{{--            <h3 class="ltext-103 cl5">Sản phẩm bán chạy</h3>--}}
{{--            <hr class="bor-b-blue">--}}
{{--        </div>--}}
{{--        <div class="product owl-carousel owl-theme">--}}
{{--            @foreach($products as $product)--}}
{{--                <div class="item">--}}
{{--                    <!-- Block2 -->--}}
{{--                    <div class="block2">--}}
{{--                        <div class="block2-pic hov-img1 product-shadow rounded">--}}
{{--                            <img src="{{asset('uploads') . '/' . $product->photo}}" class="product-thumb"--}}
{{--                                 alt="IMG-PRODUCT"/>--}}
{{--                            <a href="#"--}}
{{--                               class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1"--}}
{{--                               onclick="loadQuickProduct({{$product->id}})" id="product_quick_2">--}}
{{--                                Xem nhanh--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="block2-txt d-flex flex-nowrap flex-t p-t-14">--}}
{{--                            <div class="block2-txt-child1 d-flex align-items-center flex-column">--}}
{{--                                <a href="{{route('productDetail',$product->slug)}}"--}}
{{--                                   class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 text-center">--}}
{{--                                    {{$product->name}}--}}
{{--                                </a>--}}
{{--                                <div class="stext-105 cl3">--}}
{{--                                    @if($product->discount_number != 0)--}}
{{--                                        <span class="normal-price discount"> {{number_format($product->price)}}₫</span>--}}
{{--                                    @endif--}}
{{--                                    <span--}}
{{--                                        class="special-price">{{number_format($product->price - ($product->price * $product->discount_number)/100)}}₫</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="block2-txt-child2 flex-r p-t-3">--}}
{{--                                <button type="button"--}}
{{--                                        class="btn-addwish-b2 active dis-block pos-relative js-addwish-b2">--}}
{{--                                    <i class="fa fa-heart-o" aria-hidden="true"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="discount-number">--}}
{{--                            {{$product->discount_number}} %--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
</section>
