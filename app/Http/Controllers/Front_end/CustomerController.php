<?php

namespace App\Http\Controllers\Front_end;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front_end\Customer\RatingFormRequest;
use App\Http\Requests\Front_end\Customer\UpdatePasswordFormRequest;
use App\Http\Services\Font_end\CustomerService;
use App\Mail\OrderMail;
use App\Models\OrderDetails;
use App\Models\Orders;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    public $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function order()
    {
        $orders = Orders::all();
        return view('front_end.customer.CustomerOrder', compact('orders'));
    }

    public function orderDetail($id)
    {
        $order = Orders::find($id);
        return view('front_end.customer.CustomerDetailOrder', compact('order'));
    }

    public function review($id)
    {
        $product = OrderDetails::find($id)->productDetail->product;
        return view('front_end.customer.CustomerReview', ['product' => $product, 'orderDetailId' => $id]);
    }

    public function reviewStore(RatingFormRequest $request, $orderDetailId)
    {
        $orderId = OrderDetails::find($orderDetailId)->order_id;
        $this->customerService->reviewStore($request, $orderDetailId);
        return redirect()->route('user.order-detail', $orderId);
    }

    public function changePassword(){
        return view('front_end.customer.CustomerFormChangePassword');
    }

    public function updatePassword(UpdatePasswordFormRequest $request, $userId){
        if (\Hash::check($request->currentPassword,auth()->user()->password)){
            try {
                User::where('id',$userId)->update([
                    'password' => Hash::make($request->newPassword)
                ]);
                return redirect()->route('homePage');
            }catch (\Exception $exception){
                return $exception;
            }
        }else{
            session()->flash('currentPassword','Mật khẩu không đúng');
            return redirect()->route('user.change-password')->with('error','Mật khẩu không đúng');
        }
    }


}
