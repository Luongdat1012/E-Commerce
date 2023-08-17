@extends('front_end.customer.CustomerLayout')
@section('customer-content')
    <div class="col-sm-12 col-md-12 col-lg-9 table-responsive-sm">
        <h3 class="p-tb-30 text-dark">Đánh giá sản phẩm</h3>
        <div class="m-b-50">
            <div class="row">
                <div class="col-4 col-sm-4">
                    <h3 class="p-b-15 text-dark">Sản phẩm ABC</h3>
                    <img class="w-full" src="{{asset('uploads') . '/' . $product->photo}}" alt="">
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8">
                    <div class="p-b-30 m-lr-15-sm">
                        <!-- Add review -->
                        <form class="w-full" method="post" action="{{route('user.order-review-store',$orderDetailId)}}" >
                            @csrf
                            <h5 class="mtext-108 cl2 p-b-7"> Add a review </h5>
                            <div class="flex-w flex-m py-2">
                                    <span class="stext-102 cl3 m-r-16">
                                        Your Rating
                                    </span>
                                <span class="wrap-rating fs-18 cl11 pointer">
                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                <input class="dis-none" type="number" name="rating">
                            </span>
                            </div>
                            <div class="row p-b-25">
                                <div class="col-12 p-b-5">
                                    <label class="stext-102 cl3" for="review">Your review</label>
                                    <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10"
                                              id="review" name="review"></textarea>
                                </div>
                            </div>
                            <button
                                class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
