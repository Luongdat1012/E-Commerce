@extends('admin.layout.LayoutMain')
@section('title','Order detail')
@section('content-main-page')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="font-weight-bol pb-4">Customer Detail</h4>
                    <div class="row">
                        <div class="col-md-2 col-12">
                            <img class="w-50" src="{{asset('assets/images/account-null.jpg')}}" alt="">
                        </div>
                        <div class="row col-md-10 col-12">
                            <div class="col-md-4 col-12">
                                <p>Name</p>
                                <p class="text-dark font-weight-bold">{{$order->user->name}}</p>
                            </div>
                            <div class="col-md-4 col-12">
                                <p>Email</p>
                                <p class="text-dark font-weight-bold">{{$order->user->email}}</p>
                            </div>
                            <div class="col-md-4 col-12">
                                <p>Phone</p>
                                <p class="text-dark font-weight-bold">1231231231</p>
                            </div>
                            <div class="col-md-4 col-12">
                                <p>Address</p>
                                <p class="text-dark font-weight-bold">My Dinh - Nam Tu Liem - Ha Noi</p>
                            </div>
                            <div class="col-md-4 col-12">
                                <p>Total payment</p>
                                <p class="text-dark font-weight-bold">123123123</p>
                            </div>
                            <div class="col-md-4 col-12">
                                <p>Rank</p>
                                <p class="text-dark font-weight-bold">Default</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h3 class="font-weight-bol pb-2">Order detail</h3>
                    <div class="row py-0 align-items-center my-3">
                        <h5 class="col-md-2">#{{$order->id}}</h5>
                        <div class="col-md-7 text-center">
                            <label for="order-status" class="dis-inline-block px-3">Status</label>
                            <div class="btn-group">
                                <button type="button"
                                        @class(['btn dropdown-toggle waves-effect',
                                        'btn-warning' => $order->status == 'pending' ?? null,
                                        'btn-primary' => $order->status == 'shipping' ?? null,
                                        'btn-success' => $order->status == 'success' ?? null,
                                        'btn-danger' => $order->status == 'cancel' ?? null
                                        ])
                                        data-toggle="dropdown"> {{$order->status}} <i
                                        class="mdi mdi-chevron-down @if(in_array($order->status, ['success','cancel'])) d-none @endif"></i>
                                </button>
                                @if($order->status == 'pending' || $order->status == 'shipping')
                                    <div class="dropdown-menu">
                                        @if($order->status == 'pending')
                                            <div class="dropdown-item"
                                                 wire:click.prevent="updateOrderStatus({{$order->id}},'shipping')"
                                                 href="#">Shipping
                                            </div>
                                        @endif
                                        <div class="dropdown-item"
                                             wire:click.prevent="updateOrderStatus({{$order->id}},'success')">Success
                                        </div>
                                        <div class="dropdown-item"
                                             wire:click.prevent="updateOrderStatus({{$order->id}},'cancel')">Cancel
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <h5 class="col-md-3 text-right">Ngày
                            tạo: {{date('H:i:s - d/m/Y', strtotime($order->created_at))}}</h5>
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
                                <th>Price</th>
                                <th>Quantity</th>
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
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="card-body col-md-4 col-12 my-3">
                            <div class="card-header bg-dark py-3 text-white">
                                <div class="card-widgets">
                                    <a data-toggle="collapse" href="#card-customer-shipping" role="button"
                                       aria-expanded="false"
                                       aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                                </div>
                                <h5 class="card-title mb-0 text-white">Shipping</h5>
                            </div>
                            <div id="card-customer-shipping" class="collapse show bg-light">
                                <div class="text-dark">
                                    <p class="font-18 text-secondary py-2 pl-3">Địa chỉ:
                                        <span class="font-16 text-dark">
                                        {{$order->address .'-'. $order->getWard($order->wards)->name . '-' . $order->getDistrict($order->district)->name . '-' . $order->getWard($order->province)->name}}
                                    </span>
                                    </p>
                                </div>
                                <div class="text-dark">
                                    <p class="font-18 text-secondary py-2 pl-3">Note:
                                        <span class="font-16 text-dark">ádasdasdas</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body col-md-8 col-12 my-3 ">
                            <div class="table-responsive ">
                                <table class="table table-bordered mb-0 text-dark">
                                    <tr>
                                        <th class="h4">Sub total</th>
                                        <td colspan="2"
                                            class="text-right h4 text-danger">{{showPrice($order->sub_total)}}
                                            ₫
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="h4">Discount</th>
                                        <td class=""></td>
                                        <td class="text-right w-25 h4 text-danger">{{showPrice($order->discount)}}₫</td>
                                    </tr>
                                    <tr>
                                        <th class="h4">Total</th>
                                        <td colspan="2" class="text-right h4 text-danger">{{showPrice($order->total)}}
                                            ₫
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>

@endsection
