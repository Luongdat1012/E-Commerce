@extends('front_end.customer.CustomerLayout')
@section('customer-content')
    <div class="col-sm-12 col-md-12 col-lg-9 table-responsive-sm">
        <h3 class="p-tb-30 text-dark">Thông tin cá nhân</h3>
        <table class="table text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
                <th scope="col">Create at</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{showPrice($order->total)}} ₫</td>
                    <td>
                        <div class="btn-group">
                            <button type="button"
                                    @class(['btn waves-effect',
                                    'btn-warning' => $order->status == 'pending' ?? null,
                                    'btn-primary' => $order->status == 'shipping' ?? null,
                                    'btn-success' => $order->status == 'success' ?? null,
                                    'btn-danger' => $order->status == 'cancel' ?? null
                                    ])
                                    > {{$order->status}} <i
                                    class="mdi mdi-chevron-down @if(in_array($order->status, ['success','cancel'])) d-none @endif"></i>
                            </button>
                            @if($order->status == 'pending' || $order->status == 'shipping')
                                <div class="dropdown-menu">
                                    @if($order->status == 'pending')
                                        <div class="dropdown-item"
                                             wire:click.prevent="updateOrderStatus({{$order->id}},'shipping')" href="#">
                                            Shipping
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
                    </td>
                    <td>{{date('H:i:s - d/m/Y', strtotime($order->created_at))}}</td>
                    <td class="text-right">
                        <a href="{{route('user.order-detail',$order->id)}}"
                           class="btn btn-icon waves-effect waves-light btn-success btn-xl">
                            <i class="fas fa-book-open"></i>
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
