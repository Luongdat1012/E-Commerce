@extends('admin.layout.LayoutMain')
@section('title','Sản phẩm')
@section('content-main-page')
    <div class="row pb-3">
        <div class="alert alert-success text-left col-3">
            Alo
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-lg-12">
            <a href="{{route('admin.product.create')}}"
               class="btn badge-primary waves-effect width-md waves-light float-right">Thêm
                mới</a>
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
                                <th style="width: 5%">ID</th>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Hình ảnh</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Hiển thị</th>
                                <th style="width: 8%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->sku}}</td>
                                <td>
                                    <img style="width: 10px" src="{{asset('uploads/product'). '/' . $value->photo}}" alt="">
                                </td>
                                <td>{{$value->price}}</td>
                                <td>{{$value->discount_number}}%</td>
                                <td>{{$value->active}}</td>
                                <td class="text-right">
                                    <a id="" href="{{route('admin.product.edit',$value->id)}}"
                                       class="btn btn-icon waves-effect waves-light btn-success btn-sm">
                                        <i class="mdi mdi-lead-pencil"></i>
                                    </a>
                                    <form class="d-inline" method="post" action="{{route('admin.product.destroy',$value->id)}}" id="">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-icon waves-effect waves-light btn-danger btn-sm">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </form>
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
@endsection

@section('scrip-custom')
@endsection
