<div class="header-cart flex-col-l p-l-30">
    <div class="header-cart-title flex-w flex-sb-m p-b-8">
        <span class="mtext-103 cl2"> Your Cart </span>

        <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
            <i class="zmdi zmdi-close"></i>
        </div>
    </div>
    @if(Cart::count() > 0)
        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full" id="cart-mini">
                @foreach(Cart::content() as $item)
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img" wire:click.prevent="destroy('{{$item->rowId}}')">
                            <img src="{{asset('uploads') . '/' . $item->model->product->photo}}"
                                 alt="{{$item->name}}"/>
                        </div>
                        <div class="header-cart-item-txt">
                            <a href="{{route('productDetail',$item->model->product->slug)}}"
                               class="header-cart-item-name p-b-10 hov-cl1 trans-04 p-l-5">
                                <span>{{$item->name}}</span>
                            </a>
                            <div class="header-cart-item-txt-attr d-flex align-items-center p-tb-10">
                                <div class="header-cart-item-txt-attr-color"></div>
                                <div class="header-cart-item-txt-attr-size">
                                    <span>{{getSize($item->options->size)->name}}</span>
                                </div>
                                <div
                                    class="header-cart-item-txt-attr-number d-flex align-items-center justify-content-around">
                                    <div class="btn-num-product-down flex-c-m"
                                         wire:click.prevent="decreaseQuantity('{{$item->rowId}}')">
                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                    </div>
                                    <input class="mtext-104 cl3 txt-center num-product" type="number"
                                           name="num-product1"
                                           value="{{$item->qty}}"/>
                                    <div class="btn-num-product-up flex-c-m"
                                         wire:click.prevent="increaseQuantity('{{$item->rowId}}')">
                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="header-cart-item-price p-t-10">
                                <span class="header-cart-item-price-normal">{{showPrice($item->price)}}₫</span>
                                <span class="header-cart-item-price-discount">{{showPrice($item->price)}}₫</span>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">Tổng: <span
                        class="text-danger">{{Cart::subtotal()}}₫</span></div>

                <div class="header-cart-buttons flex-w w-full justify-content-center">
                    <a href="{{route('cart')}}"
                       class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        View Cart
                    </a>

                    <button type="button" wire:click.prevent="checkout"
                    class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10" id="mini-cart-checkout">
                    Check Out
                    </button>
                </div>
            </div>
        </div>
    @else
        <h3 class="text-center m-t-30">Không có sản phẩm nào trong giỏ hàng của bạn</h3>
    @endif
</div>
