<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Mail\OrderMail;
use App\Models\Coupons;
use App\Models\District;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Province;
use App\Models\Transaction;
use App\Models\Ward;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CheckoutComponent extends Component
{
    public $haveCoupon;
    public $couponCode;
    public $discount;
    public $totalAfterDiscount;
    public $fullName, $email, $phone, $province, $district, $ward, $address, $paymentMode;
    public $districts = [], $wards = [];
    public $thankyou;

    protected $rules = [
        'fullName' => 'required',
        'email' => 'required|email',
        'phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
        'province' => 'required',
        'district' => 'required',
        'ward' => 'required',
        'paymentMode' => 'required'
    ];

    protected $messages = [
        'fullName.required' => 'Tên không được để trống',
        'fullName.email' => 'Tên không hợp lệ',
        'email.required' => 'Email không được để trống',
        'email.email' => 'Email không hợp lệ',
        'phone.regex' => 'Phone không hợp lệ'
    ];

    public function applyCouponCode()
    {
        $coupon = Coupons::where('code', $this->couponCode)
            ->where('expiry_date', '>=', Carbon::today())
            ->where('cart_value', '<=', Cart::subtotal())->first();
        if (!$coupon) {
            session()->flash('coupon_message', 'Mã giảm giá không hợp lệ');
            return true;
        }

        session()->put('coupon', [
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'cart_value' => $coupon->cart_value
        ]);
    }

    public function calculateDiscounts()
    {
        if (session()->has('coupon')) {
            if (session()->get('coupon')['type'] == 'fixed') {
                $this->discount = session()->get('coupon')['value'];
            } else {
                $this->discount = (Cart::total() * session()->get('coupon')['value']) / 100;
            }
            $this->totalAfterDiscount = Cart::total() - $this->discount >= 0 ? Cart::total() - $this->discount : 0;
        }
    }

    public function removeCoupon()
    {
        session()->forget('coupon');
    }

    public function updatedProvince()
    {
        $this->districts = District::where('province_id', $this->province)->get();
        $this->wards = [];
    }

    public function updatedDistrict()
    {
        $this->wards = Ward::where('district_id', $this->district)->get();
    }

    public function updated($field){
        $this->validateOnly($field);
    }

    public function mailOrderConfirm($order){
        Mail::to($order->email)->send(new OrderMail($order));
    }

    public function placeOrder()
    {
        $this->validate();

        $order = Orders::create([
            'user_id' => Auth::user()->id,
            'sub_total' => Cart::total(),
            'discount' => $this->discount ? $this->discount : 0,
            'total' => $this->totalAfterDiscount ? $this->totalAfterDiscount : Cart::total(),
            'name' => Auth::user()->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'province' => $this->province,
            'district' => $this->district,
            'wards' => $this->ward,
            'address' => $this->address,
            'status' => 'pending'
        ]);

        foreach (Cart::content() as $item){
            OrderDetails::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'price' => $item->price,
                'quantity' => $item->qty
            ]);
        }

        if ($this->paymentMode == 'COD'){
            Transaction::create([
                'user_id' => Auth::user()->id,
                'status' => 'pending',
                'order_id' => $order->id,
            ]);
        }

        Cart::destroy();
        if (Session::has('coupon')){
            Session::forget('coupon');
        }
        $this->mailOrderConfirm($order);
        $this->thankyou = 1;
    }

    public function verifyForCheckout()
    {
        if (!Auth::check()){
            return redirect()->route('login');
        }elseif ($this->thankyou){
            return redirect()->route('thankyou');
        }else if (Cart::total() <= 0){
            return redirect()->route('cart');
        }
        return true;
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function render()
    {
        if (Session::has('coupon')) {
            if (Cart::subtotal() < session()->get('coupon')['cart_value']) {
                session()->forget('coupon');
            } else {
                $this->calculateDiscounts();
            }
        }
        $provinces = Province::all();
        $this->verifyForCheckout();
        return view('livewire.frontend.checkout.checkout-component', compact('provinces'));
    }
}
