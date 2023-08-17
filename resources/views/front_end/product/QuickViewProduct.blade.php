<div class="wrap-modal1 js-modal1 p-t-60 p-b-20 show-modal1" id="model_product_{{$product->id}}">
    <div class="overlay-modal1 js-hide-modal1"></div>
    <div class="container">
        <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
            <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                <img src="http://shopltd.com/assets/images/icons/icon-close.png" alt="CLOSE"/>
            </button>
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                <div class="item-slick3"
                                     data-thumb="{{asset('uploads') . '/' . $product->photo}}">
                                    <div class="wrap-pic-w pos-relative">
                                        <img class="product-thumb"
                                             src="{{asset('uploads') . '/' . $product->photo}}"
                                             alt="IMG-PRODUCT"/>
                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                           href="{{asset('uploads') . '/' . $product->photo}}" target="_blank">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                                @foreach($product->gallery as $item)
                                    <div class="item-slick3"
                                         data-thumb="{{asset('uploads') . '/' . $item->name}}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img class="product-thumb"
                                                 src="{{asset('uploads') . '/' . $item->name}}"
                                                 alt="IMG-PRODUCT"/>
                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                               href="{{asset('uploads') . '/' . $item->name}}" target="_blank">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{$product->name}}
                        </h4>
                        <span class="mtext-106 cl2"> {{number_format($product->price) }} </span>
                        <p class="stext-102 cl3 p-t-23">
                            {!! $product->description !!}
                        </p>
                        <div class="p-t-33">
                            @if($product->product_att_status)
                                <div class="flex-w align-items-center p-b-10">
                                    <div class="size-203 respon6">Size</div>
                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="quick_size" id="quick_size">
                                                <option value="">Choose an option</option>
                                                @foreach(json_decode($product->att_products)->sizes as $item)
                                                    <option
                                                        value="{{$item}}">{{$product->getSize($item)->name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-w p-b-10 align-items-center">
                                    <div class="size-203 respon6">Color</div>
                                    <div class="size-204 respon6-next">
                                        <div class="d-flex align-items-center">
                                            @foreach(json_decode($product->att_products)->colors as $item)
                                                <div class="color-icon" data-color="{{$item}}"
                                                     style="background-color: {{$product->getColor($item)->value}}"
                                                     id="select-color-{{$item}}">
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="flex-w flex-r p-b-10" id="add-to-cart">
                                <p class="size-204 text-danger fs-16" id="alert-message-err"></p>
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m"
                                             id="quick-view-num-down">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>
                                        <input class="mtext-104 cl3 txt-center num-product" type="number"
                                               name="num-product" value="1"/>

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m"
                                             id="quick-view-num-up">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                    <button onclick="addToCart({{$product->id}})"
                                            class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                        Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                            <div class="flex-m bor9 p-r-10 m-r-11">
                                <a href="#"
                                   class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                                   data-tooltip="Add to Wishlist">
                                    <i class="zmdi zmdi-favorite"></i>
                                </a>
                            </div>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                               data-tooltip="Facebook">
                                <i class="fa fa-facebook"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                               data-tooltip="Twitter">
                                <i class="fa fa-twitter"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                               data-tooltip="Google Plus">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        /*==================================================================*/
        // $(".js-show-modal1").on("click", function (e) {
        //     e.preventDefault();
        //     $(".js-modal1").addClass("show-modal1");
        // });

        $(".js-hide-modal1").on("click", function () {
            $(".js-modal1").removeClass("show-modal1");
            $("#model_product_{{$product->id}}").remove();
        });

        /*==================================================================*/
        $(".js-select2").each(function () {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next(".dropDownSelect2"),
            });
        });

        /*==================================================================
            [ Slick3 ]*/
        $(".wrap-slick3").each(function () {
            $(this)
                .find(".slick3")
                .slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    fade: true,
                    infinite: true,
                    autoplay: false,
                    autoplaySpeed: 6000,

                    arrows: true,
                    appendArrows: $(this).find(".wrap-slick3-arrows"),
                    prevArrow:
                        '<button class="arrow-slick3 prev-slick3"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
                    nextArrow:
                        '<button class="arrow-slick3 next-slick3"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',

                    dots: true,
                    appendDots: $(this).find(".wrap-slick3-dots"),
                    dotsClass: "slick3-dots",
                    customPaging: function (slick, index) {
                        var portrait = $(slick.$slides[index]).data("thumb");
                        return (
                            '<img src=" ' +
                            portrait +
                            ' "/><div class="slick3-dot-overlay"></div>'
                        );
                    },
                });
        });

        $(".color-icon").each(function () {
            $(this).on("click", function () {
                for (let i = 0; i < $(".color-icon").length; i++) {
                    $($(".color-icon")[i]).removeClass("color-icon-active");
                }
                $(this).addClass("color-icon-active");
            });
        });

        $('.color-icon').on('click', function () {
            let size = $("#quick_size option:selected").val();
            let color = $(this).data('color');
            let productId = {{$product->id}};
            if (size && color) {
                checkProductQuantity(productId, size, color);
            }
        });

        $("#quick_size").on('change', function () {
            let size = $("#quick_size option:selected").val();
            let color = $('.color-icon-active').data('color');
            let productId = {{$product->id}};
            if (size && color) {
                checkProductQuantity(productId, size, color);
            }
        })

        /*==================================================================
            [ +/- num product ]*/
        $("#quick-view-num-down").on("click", function () {
            let numProduct = Number($(this).next().val());
            if (numProduct > 1)
                $(this)
                    .next()
                    .val(numProduct - 1);
        });
        $("#quick-view-num-up").on("click", function () {
            let numProduct = Number($(this).prev().val());
            $(this)
                .prev()
                .val(numProduct + 1);
        });

    </script>
</div>






