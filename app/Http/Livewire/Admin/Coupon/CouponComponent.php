<?php

namespace App\Http\Livewire\Admin\Coupon;

use App\Models\Coupons;
use App\Models\Products;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CouponComponent extends Component
{
    public $couponId;

    protected $listeners = ['deleteCouponDone' => 'deleteCoupon'];

    public function deleteConfirm($id){
        $this->couponId = $id;
        $this->dispatchBrowserEvent('deleteCoupon');
    }

    public function deleteCoupon(){
        try {
            Coupons::find($this->couponId)->delete();
            Session::flash('success', 'Xóa mã giảm giá thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Lỗi! Vui lòng thử lại sau ít phút');
        }
    }

    public function render()
    {
        $coupons = Coupons::all();
        return view('livewire.admin.coupon.coupon-component',compact('coupons'));
    }
}
