<div>
{{--                @dd(Cart::content()->first()->model->product->photo)--}}
    <div class="container">
        <div class="bread-crumb flex-w p-t-30">
            <a href="{{route('homePage')}}" class="stext-118 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>
            <span class="stext-118 cl4"> Cart </span>
        </div>
    </div>
    <form class="bg0 p-t-75 p-b-85">
        <div class="container">
            @if(Cart::content()->count() <= 0)
                <h1 class="text-center text-dark">Không có sản phẩm nào trong giỏ hàng</h1>
            @else
                <div class="m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        @if(session()->has('success_message'))
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('success_message') }}
                            </div>
                        @endif
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1">Sản phẩm</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Đơn giá</th>
                                    <th class="column-4 text-center">Số lượng</th>
                                    <th class="column-5">Thành tiền</th>
                                    <th class="column-6"></th>
                                </tr>
                                @foreach(Cart::content() as $cartItem)
                                    <tr class="table_row">
                                        <td class="column-1">
                                            <div class="how-itemcart1"
                                                 wire:click.prevent="destroy('{{$cartItem->rowId}}')">
                                                <img src="{{asset('uploads').  '/' . $cartItem->model->product->photo}}"
                                                     alt="IMG"/>
                                            </div>
                                        </td>
                                        <td class="column-2">
                                            <a href="">
                                                <div class="fs-18 text-uppercase text-dark">{{$cartItem->name}}</div>
                                            </a>
                                            <div class=" fs-18"> {{getSize($cartItem->options->size)->name}} / <i
                                                    style="color: {{getColor($cartItem->options->color)->value}}"
                                                    class="fa-solid fa-circle"></i></div>
                                        </td>
                                        <td class="column-3">
                                            <div class="text-center fs-18">{{showPrice($cartItem->price)}}₫</div>
                                            <div class="fs-12 text-muted">
                                                <s>{{showPrice($cartItem->model->product->price)}}₫</s>
                                            </div>
                                        </td>
                                        <td class="column-4">
                                            <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                <a href="#" class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m"
                                                   wire:click.prevent="decreaseQuantity('{{$cartItem->rowId}}')">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </a>

                                                <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                       name="num-product1" value="{{$cartItem->qty}}"/>

                                                <a href="#" class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m"
                                                   wire:click.prevent="increaseQuantity('{{$cartItem->rowId}}')">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="column-5">
                                            <div
                                                class="text-center fs-18 text-danger">
                                                {{showPrice($cartItem->subtotal)}}₫
                                            </div>
                                        </td>
                                        <td class="column-6 text-center"
                                            wire:click.prevent="destroy('{{$cartItem->rowId}}')">
                                            <a href="#" class="text-dark curson fs-20">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                        </div>
                        <div class="total-price text-right fs-20 p-t-25">Tổng cộng : <span
                                class="text-danger font-weight-bold">{{Cart::subtotal()}} ₫</span></div>
                        <div class="d-flex justify-content-end p-t-18 p-b-15 p-lr-15-sm">
                            <div
                                class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10 m-r-30"
                                wire:click.prevent="destroyAll()">
                                Xóa tất cả
                            </div>
                            <div>
                                <button type="button" wire:click.prevent="checkout" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Thanh toán</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </form>

</div>
