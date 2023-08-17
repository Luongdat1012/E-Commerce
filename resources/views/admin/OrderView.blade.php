@extends('admin.layout.LayoutMain')
@section('title','Order')
@section('content-main-page')
    <div class="row pb-3">
        <div class="col-lg-12">
            <a href="#" class="btn badge-primary waves-effect width-md waves-light float-right">Thêm
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
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>
                                    <a href="#" class="badge badge-success">Xác nhận</a>
                                    <a href="#" class="badge badge-danger">Hủy</a>
                                </td>
                                <td>
                                    <a href="" class="btn btn-icon waves-effect waves-light btn-primary btn-sm">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="" class="btn btn-icon waves-effect waves-light btn-success btn-sm">
                                        <i class="mdi mdi-lead-pencil"></i>
                                    </a>
                                    <a id="delete_order" href="#" class="btn btn-danger waves-effect waves-light btn-sm">
                                        <i class="mdi mdi-delete"></i>
                                    </a>

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>
                                    <a href="#" class="badge badge-primary">Giao hàng</a>
                                    <a href="#" class="badge badge-danger">Hủy</a>
                                    <a href="#" class="badge badge-pink">Hoàn thành</a>
                                </td>
                                <td>
                                    <button type="button"
                                            class="btn btn-icon waves-effect waves-light btn-primary btn-sm">
                                        <i class="far fa-eye"></i>
                                    </button>
                                    <button type="button"
                                            class="btn btn-icon waves-effect waves-light btn-success btn-sm">
                                        <i class="mdi mdi-lead-pencil"></i>
                                    </button>
                                    <button type="button" id="sa-success"
                                            class="btn btn-icon waves-effect waves-light btn-danger btn-sm">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <nav>
                <ul class="pagination pagination-split float-right">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">«</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">4</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">5</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">»</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
<!-- JQuery -->
@section('scrip-custom')
    <script>
        $(document).ready(function () {
            $("#delete_order").click(function (e) {
                e.preventDefault();
                const href = $(this).attr('href');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if(result.value){
                        window.location.href= href;
                    }
                });
            });
        });
    </script>
@endsection

