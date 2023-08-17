<?php

namespace App\Http\Livewire\Frontend\Cart;


use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartComponent extends Component
{

    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty);
        $this->emit('CartAddedUpdated');
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        if ($product->qty > 1) {
            $qty = $product->qty - 1;
            Cart::update($rowId, $qty);
        }
        $this->emit('CartAddedUpdated');
    }

    public function destroy($rowId)
    {
        $product = Cart::get($rowId);
        Cart::remove($rowId);
        $this->emit('CartAddedUpdated');
        session()->flash('success_message', `Sản phẩm {$product->name} đã được xóa khỏi giỏ hàng`);
    }

    public function destroyAll()
    {
        $this->emit('CartAddedUpdated');
        Cart::destroy();
        $this->emit('CartAddedUpdated');
    }

    public function checkout(){
        if (Auth::check()){
            return redirect()->route('checkout');
        }else{
            $this->dispatchBrowserEvent('goToLogin');
        }
    }

    public function render()
    {
        return view('livewire.frontend.cart.cart-component');
    }
}
