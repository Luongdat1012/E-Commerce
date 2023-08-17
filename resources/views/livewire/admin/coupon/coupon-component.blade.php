<div>
    <div class="row pb-3">
        <div class="alert alert-success text-left col-3">
            Alo
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-lg-12">
            <a href="{{route('admin.coupon.create')}}"
               class="btn badge-primary waves-effect width-md waves-light float-right">Thêm
                mới
            </a>
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
                            <tr>
                                <th width="5%">ID</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Value</th>
                                <th>Cart Value</th>
                                <th style="width: 15%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coupons as $coupon)
                                <tr>
                                    <td>{{$coupon->id}}</td>
                                    <td>{{$coupon->name}}</td>
                                    <td>{{$coupon->code}}</td>
                                    <td>
                                        <span>{{showPrice($coupon->value)}} {{$coupon->type == 'percent' ? '%' : '₫' }} </span>
                                    </td>
                                    <td>{{showPrice($coupon->cart_value)}}₫</td>
                                    <td class="text-right">
                                        <a href="{{route('admin.coupon.edit',$coupon->id)}}"
                                           class="btn btn-icon waves-effect waves-light btn-success btn-sm">
                                            <i class="mdi mdi-lead-pencil"></i>
                                        </a>
                                        <button type="submit" wire:click.prevent="deleteConfirm({{$coupon->id}})" class="btn btn-icon waves-effect waves-light btn-danger btn-sm">
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


