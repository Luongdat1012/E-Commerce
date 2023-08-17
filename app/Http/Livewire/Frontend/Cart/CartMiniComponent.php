<?php

namespace App\Http\Livewire\Frontend\Cart;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartMiniComponent extends Component
{
    protected $listeners = ['CartAdded','goToLogin'];

    public function CartAdded()
    {
        return Cart::content();
    }

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
        Cart::remove($rowId);
        $this->emit('CartAddedUpdated');
    }

    public function checkout()
    {
        if (Auth::check()) {
            return redirect()->route('checkout');
        } else {
            $this->dispatchBrowserEvent('goToLogin');
        }
    }

    public function goToLogin(){
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.frontend.cart.cart-mini-component');
    }
}
