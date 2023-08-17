@extends('admin.layout.LayoutMain')
@section('title','Thuộc tính sản phẩm')
@section('content-main-page')
    <div class="row pb-3">
        <div class="alert alert-success text-left col-3">
            Alo
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-lg-12">
            <a href="{{route('admin.attribute.create')}}"
               class="btn badge-primary waves-effect width-md waves-light float-right">Thêm
                mới</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-2">
                <div class="card-body">
                    <h4 class="header-title mb-4">Color</h4>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-dark">
                            <tr>
                                <th style="width: 5%">ID</th>
                                <th>Name</th>
                                <th>Giá trị</th>
                                <th style="width: 8%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($color as $k => $v)
                                <tr>
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->name}}</td>
                                    <td>{{$v->value}}</td>
                                    <td class="text-right">
                                        <form class="d-inline" method="post"
                                              action="{{route('admin.attribute.destroy',$v->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="attribute" value="color">
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
        <div class="col-lg-6">
            <div class="card mb-2">
                <div class="card-body">
                    <h4 class="header-title mb-4">Size</h4>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-dark">
                            <tr>
                                <th style="width: 5%">ID</th>
                                <th>Name</th>
                                <th>Giá trị</th>
                                <th style="width: 8%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($size as $k => $v)
                                <tr>

                                    <td>{{$v->id}}</td>
                                    <td>{{$v->name}}</td>
                                    <td>{{$v->value}}</td>
                                    <td class="text-right">
                                        <form class="d-inline" method="post"
                                              action="{{route('admin.attribute.destroy',$v->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="attribute" value="size">
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
