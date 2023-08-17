<?php

namespace App\Http\Services\Admin\Coupon;

use App\Models\Coupons;
use Illuminate\Support\Facades\Session;


class CouponService
{
    public function create($request)
    {
        try {
            Coupons::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'code' => $request->code,
                'type' => $request->type,
                'value' => $request->value,
                'cart_value' => $request->cart_value,
                'expiry_date' => $request->expiry_date
            ]);
            Session::flash('success', 'Thêm mới mã giảm giá thành công');
        } catch (\Exception $e) {
            Session::flash('error', "Thêm lỗi vui lòng thử lại sau vài phút");
        }
        return true;
    }

    public function update($request, $id){
        try {
            Coupons::where('id',$id)->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'code' => $request->code,
                'type' => $request->type,
                'value' => $request->value,
                'cart_value' => $request->cart_value,
                'expiry_date' => $request->expiry_date
            ]);
            Session::flash('success', 'Sửa mã giảm giá thành công');
        }catch (\Exception $e){
            Session::flash('error', "Thêm lỗi vui lòng thử lại sau vài phút");
        }
    }

}
