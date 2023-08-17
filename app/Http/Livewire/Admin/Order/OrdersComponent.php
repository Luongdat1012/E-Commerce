<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Orders;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class OrdersComponent extends Component
{
    public $orderId;

    protected $listeners = ['deleteOrderDone' => 'deleteOrder'];

    public function deleteConfirm($id)
    {
        $this->orderId = $id;
        $this->dispatchBrowserEvent('deleteOrder');
    }

    public function updateOrderStatus($orderId, $status)
    {
        switch ($status) {
            case 'shipping':
                Orders::where('id', $orderId)->update([
                    'status' => 'shipping',
                    'updated_at' => Carbon::now()
                ]);
                break;
            case 'success':
                Orders::where('id', $orderId)->update([
                    'status' => 'success',
                    'updated_at' => Carbon::now()
                ]);
                break;
            case 'cancel':
                Orders::where('id', $orderId)->update([
                    'status' => 'cancel',
                    'updated_at' => Carbon::now()
                ]);
                break;
        }
    }

    public function deleteOrder()
    {
        try {
            Orders::find($this->orderId)->delete();
            Session::flash('success', 'Xóa đơn hàng thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Lỗi! Vui lòng thử lại sau ít phút');
        }
    }

    public function render()
    {
        $orders = Orders::get();
        return view('livewire.admin.order.orders-component', compact('orders'));
    }


}
