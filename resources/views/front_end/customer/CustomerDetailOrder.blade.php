@extends('front_end.customer.CustomerLayout')
@section('customer-content')
    <div class="col-sm-12 col-md-12 col-lg-9">
        <div class="row py-0 align-items-center my-3">
            <h5 class="col-md-6">#15</h5>
            <div class="col-md-6 text-right">
                <h5 @class([ 'text-uppercase',
                                    'text-warning' => $order->status == 'pending' ?? null,
                                    'text-primary' => $order->status == 'shipping' ?? null,
                                    'text-success' => $order->status == 'success' ?? null,
                                    'text-danger' => $order->status == 'cancel' ?? null
                                    ])>{{$order->status}}</h5>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-6">
                <h4 class="py-3">Địa chỉ nhận hàng</h4>
                <h5 class="p-b-10 text-dark">{{$order->user->name}}</h5>
                <h6 class="p-b-10">{{$order->phone}}</h6>
                <h6 class="p-b-3">{{$order->address .'-'. $order->getWard($order->wards)->name . '-' . $order->getDistrict($order->district)->name . '-' . $order->getWard($order->province)->name}}</h6>
            </div>
            <div class="col-md-6">
                <h4 class="py-3">Phương thức thanh toán</h4>
                <h5 class="p-b-10 text-dark">123</h5>

            </div>

        </div>

        <div class="table-responsive">
            <table class="table mb-0 h6">
                <thead class="thead-dark text-center">
                <tr>
                    <th width="5%">ID</th>
                    <th width="10%">Image</th>
                    <th width="10%"></th>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    @if($order->status == 'success')
                        <th></th>
                    @endif
                </tr>
                </thead>
                <tbody class="text-center">
                @foreach($order->orderDetails as $item)
                    <tr>
                        <td class="align-middle">{{$item->productDetail->id}}</td>
                        <td class="align-middle">
                            <img class="w-50"
                                 src="{{asset('uploads') . '/'. $item->productDetail->product->photo}}"
                                 alt="">
                        </td>
                        <td class="align-middle">
                            <div class=" fs-18"> {{getSize($item->productDetail->size_id)->name}} / <i
                                    style="color: {{getColor($item->productDetail->color_id)->value}}"
                                    class="fa-solid fa-circle"></i></div>
                        </td>
                        <td class="align-middle"> {{$item->productDetail->sku}}</td>
                        <td class="align-middle">
                            {{$item->productDetail->product->name}}
                        </td>
                        <td class="align-middle">
                            {{$item->quantity}}
                        </td>
                        <td class="align-middle text-danger">
                            {{showPrice($item->price)}}₫
                        </td>
                        @if($order->status == 'success' && !$item->rstatus)
                            <td>
                                <a href="{{route('user.order-review',$item->id)}}"
                                   class="btn btn-icon waves-effect text-light waves-light btn-warning btn-sm">
                                    <i class="fa-solid fa-star"></i>
                                </a>
                            </td>
                        @endif
                    </tr>
                @endforeach
                <tr>
                    <td colspan="6" class="text-left text-dark bor-none">Tổng tiền hàng</td>
                    <td class="bor-none text-danger">{{showPrice($order->sub_total)}}₫</td>
                </tr>
                <tr>
                    <td colspan="6" class="text-left text-dark bor-none">Discount</td>
                    <td class="bor-none text-danger">{{showPrice($order->discount)}}₫</td>
                </tr>
                <tr>
                    <td colspan="6" class="text-left text-dark bor-none">Tổng tiền thanh toán</td>
                    <td class="bor-none text-danger">{{showPrice($order->total)}}₫</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->

@endsection
