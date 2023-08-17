@extends('admin.layout.LayoutMain')
@section('title','Coupon')
@section('content-main-page')
    <livewire:admin.coupon.coupon-component/>
@endsection
@section('scrip-custom')
    <script>
        window.addEventListener('deleteCoupon', event => {
            Swal.fire({
                title: 'Bạn có muốn xóa mã giảm giá?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Tôi đồng ý!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteCouponDone')
                }
            })
        })
    </script>
@endsection

