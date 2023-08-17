<div>
    {{--        @dd($province)--}}
    <div class="bg0 p-t-30 p-b-85">
        <div class="container">
            <div class="row around-checkout">
                <form class="col-md-7">
                    <h4 class="mb-3">Billing address</h4>
                    <div class="mt-3">
                        <label for="fullname">Full name</label>
                        <input type="text" class="form-control" name="fullName" id="fullName" placeholder="Full name"
                               value="{{$fullName}}" wire:model="fullName">
                    </div>
                    @error('fullName')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror

                    <div class="mt-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" wire:model="email" value=""
                               placeholder="your@gmail.com">
                    </div>
                    @error('email')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror

                    <div class="mt-3">
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" wire:model="phone" value=""
                               placeholder="your@gmail.com">
                    </div>
                    @error('phone')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror

                    <div class="row">
                        <div class="col-md-4 mt-3">
                            <label for="province">Tỉnh/ Thành Phố</label>
                            <select class="custom-select d-block w-100" wire:model.lazy="province" name="province"
                                    id="province" required>
                                <option value="0" selected>Tỉnh/ Thành Phố</option>
                                @foreach( $provinces as $item )
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('province')
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                            @enderror
                        </div>

                        <div class="col-md-4 mt-3">
                            <label for="district">Quận/ Huyện</label>
                            <select class="custom-select d-block w-100" id="district" wire:model="district"
                                    name="district" required="">
                                <option value="">Quận/ Huyện</option>
                                @foreach($districts as $item )
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('district')
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                            @enderror
                        </div>

                        <div class="col-md-4 mt-3">
                            <label for="ward">Phường/ Xã</label>
                            <select class="custom-select d-block w-100" id="ward" name="ward" wire:model="ward"
                                    required="">
                                <option value="">Phường/ Xã</option>
                                @foreach($wards as $item )
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('ward')
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                            @enderror
                        </div>


                        <div class="mt-3 col-12">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" wire:model="address"
                                   placeholder="HN_VN" required="">
                        </div>
                        @error('address')
                        <small class="form-text text-danger">
                            {{$message}}
                        </small>
                        @enderror

                        <div class="mt-3 col-12">
                            <input type="radio" class="d-inline-block" id="payment-method-cod" name="paymentMode"
                                   value="COD" wire:model="paymentMode">
                            <label for="payment-method-cod" class="d-inline-block">COD</label>
                        </div>
                        <div class="mt-3 col-12">
                            <input type="radio" class="d-inline-block" id="payment-method-bank" name="paymentMode"
                                  wire:model="paymentMode">
                            <label for="payment-method-bank" class="d-inline-block">Chuyển khoản</label>
                        </div>


                        @error('transaction')
                        <small class="form-text text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>

                    <button class="btn btn-primary btn-lg btn-block mt-3" type="button" wire:click.prevent="placeOrder">
                        Continue to checkout
                    </button>

                </form>
                <div class="col-sm-12 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Tóm tắt đơn hàng</span>
                        <span class="badge badge-secondary badge-pill">{{Cart::count()}}</span>
                    </h4>
                    @if(Cart::count() > 0)
                        @foreach(Cart::content() as $item )
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex align-items-center lh-condensed">
                                    <div class="p-2 label2" data-label2="{{$item->qty}}">
                                        <img style="max-width:100px ;"
                                             src="{{asset('uploads').  '/' . $item->model->product->photo}}" alt=""
                                             class="img-thumbnail">
                                    </div>
                                    <div class="p-2">
                                        <h6 class="my-0">{{$item->name}}</h6>
                                        <div class=" fs-18">
                                            <small> {{getSize($item->options->size)->name}} /
                                                <i style="color: {{getColor($item->options->color)->value}}"
                                                   class="fa-solid fa-circle"></i>
                                            </small>
                                        </div>
                                    </div>
                                    <span class="text-muted ml-auto p-2">{{showPrice($item->price)}}₫</span>
                                    <span class="ml-auto p-2 text-danger">{{showPrice($item->subtotal)}}₫</span>
                                </li>
                            </ul>
                        @endforeach
                    @endif
                    @if(!Session::has('coupon'))
                        <div class="container m-b-20 px-0">
                            <form class="card p-2" wire:submit.prevent="applyCouponCode">
                                <div class="row justify-content-around">
                                    <input class="stext-104 cl2 plh4 size-121 bor13 p-lr-20 m-tb-5 col-md-7 col-10"
                                           type="text"
                                           name="coupon" placeholder="Coupon Code" wire:model="couponCode">

                                    <button type="submit"
                                            class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5 col-md-4 col-10">
                                        Apply coupon
                                    </button>
                                </div>
                                @if(Session::has('coupon_message'))
                                    <small class="form-text text-danger">
                                        {{Session::get('coupon_message')}}
                                    </small>
                                @endif
                            </form>
                        </div>
                    @endif

                    @if(Session::has('coupon'))
                        <div class="container text-right p-t-20">
                            <div class="flex-w flex-t p-b-20">
                                <div class="size-208 text-left">
                                    <span class="stext-110 cl2"> Subtotal: </span>
                                </div>

                                <div class="size-209">
                                    <span class="mtext-110 cl2 text-danger"> {{showPrice(Cart::subtotal())}} ₫</span>
                                </div>
                            </div>
                            <div class="flex-w flex-t p-b-20">
                                <div class="size-208 text-left">
                                    <span class="stext-110 cl2"> Discount: ({{Session::get('coupon')['code']}}) <a
                                            href="javascript:void(0);" wire:click.prevent="removeCoupon"><i
                                                class="fa-solid fa-circle-xmark text-danger"></i> </a> </span>
                                </div>

                                <div class="size-209">
                                    <span class="mtext-110 cl2 text-danger"> -{{showPrice($discount)}} ₫</span>
                                </div>
                            </div>
                            <div class="flex-w flex-t p-t-20 p-b-20">
                                <div class="size-208 text-left">
                                    <span class="stext-110 cl2"> Total: </span>
                                </div>
                                <div class="size-209">
                                    <span class="mtext-110 cl2 text-danger"> {{showPrice($totalAfterDiscount)}} ₫</span>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="container text-right p-t-20">
                            <div class="flex-w flex-t p-b-20">
                                <div class="size-208 text-left">
                                    <span class="stext-110 cl2"> Subtotal: </span>
                                </div>

                                <div class="size-209">
                                    <span class="mtext-110 cl2 text-danger"> {{showPrice(Cart::subtotal())}} ₫</span>
                                </div>
                            </div>
                            <div class="flex-w flex-t p-b-20">
                                <div class="size-208 text-left">
                                    <span class="stext-110 cl2"> Discount: </span>
                                </div>

                                <div class="size-209">
                                    <span class="mtext-110 cl2 text-danger"> 0₫</span>
                                </div>
                            </div>
                            <div class="flex-w flex-t p-t-20 p-b-20">
                                <div class="size-208 text-left">
                                    <span class="stext-110 cl2"> Total: </span>
                                </div>
                                <div class="size-209">
                                    <span class="mtext-110 cl2 text-danger"> {{showPrice(Cart::total())}} ₫</span>
                                </div>
                            </div>

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
