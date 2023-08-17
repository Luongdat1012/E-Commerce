<div>
    {{--    @dd(\Illuminate\Support\Carbon::now())--}}
    <div class="row pb-3">
        <div class="alert alert-success text-left col-3">
            Alo
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-2">
                <div class="card-body">
                    <h4 class="header-title mb-4">Order</h4>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-dark">
                            <tr class="text-center">
                                <th width="5%">ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Create at</th>
                                <th style="width: 10%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr class="text-center">
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{showPrice($order->total)}}</td>
                                    <td>
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
                                                        <div class="dropdown-item" wire:click.prevent="updateOrderStatus({{$order->id}},'shipping')" href="#">Shipping</div>
                                                    @endif
                                                    <div class="dropdown-item" wire:click.prevent="updateOrderStatus({{$order->id}},'success')">Success</div>
                                                    <div class="dropdown-item" wire:click.prevent="updateOrderStatus({{$order->id}},'cancel')">Cancel</div>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{date('H:i:s - d/m/Y', strtotime($order->created_at))}}</td>
                                    <td class="text-right">
                                        <a href="{{route('admin.order.detail',$order->id)}}"
                                           class="btn btn-icon waves-effect waves-light btn-success btn-sm">
                                            <i class="fas fa-book-open"></i>
                                        </a>
                                        <button type="submit" wire:click.prevent="deleteConfirm({{$order->id}})"
                                                class="btn btn-icon waves-effect waves-light btn-danger btn-sm">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <nav class="float-right">
            </nav>
        </div>
    </div>
    <!-- end row -->
</div>



