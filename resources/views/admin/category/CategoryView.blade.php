@extends('admin.layout.LayoutMain')
@section('title','Danh mục')
@section('content-main-page')
    <div class="row pb-3">
        <div class="alert alert-success text-left col-3">
           Alo
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-lg-12">
            <a href="{{route('admin.category.create')}}"
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
                                <th width="5%">ID</th>
                                <th>Name</th>
                                <th style="width: 15%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($recursiveCategories as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>
                                        @php
                                            echo str_repeat('|---', $item->level). ' ' .$item->category_name;
                                        @endphp

                                    </td>
                                    <td class="text-right">
                                        <a id="edit_cat_{{$item->id}}" href="{{route('admin.category.edit',$item->id)}}"
                                           class="btn btn-icon waves-effect waves-light btn-success btn-sm">
                                            <i class="mdi mdi-lead-pencil"></i>
                                        </a>
                                        <form class="d-inline" method="post" action="{{route('admin.category.destroy',$item->id)}}" id="delete_cat_{{$item->id}}">
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
                {{ $category->links() }}
            </nav>
        </div>
    </div>
    <!-- end row -->
@endsection
@section('scrip-custom')
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $("[id*='delete_cat_']").click(function (e) {--}}
{{--                console.log($(this).attr('action'));--}}
{{--                e.preventDefault();--}}
{{--                const href = $(this).attr('action');--}}

{{--                Swal.fire({--}}
{{--                    title: "Are you sure?",--}}
{{--                    text: "You won't be able to revert this!",--}}
{{--                    icon: "warning",--}}
{{--                    showCancelButton: true,--}}
{{--                    confirmButtonColor: "#3085d6",--}}
{{--                    cancelButtonColor: "#d33",--}}
{{--                    confirmButtonText: "Yes, delete it!",--}}
{{--                }).then((result) => {--}}
{{--                    console.log(result);--}}
{{--                    if (result.value) {--}}
{{--                        window.location.href = href;--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

@endsection
