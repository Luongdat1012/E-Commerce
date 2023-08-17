@extends('admin.layout.LayoutMain')
@section('title','Order')
@section('content-main-page')
    <livewire:admin.order.orders-component/>
@endsection

@section('scrip-custom')
    <script>
        window.addEventListener('deleteOrder', event => {
            Swal.fire({
                title: 'Bạn có muốn xóa đơn hàng?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Tôi đồng ý!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteOrderDone')
                }
            })
        })
    </script>
@endsection
