<?php

namespace App\Http\Livewire\Frontend\Cart;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartCountComponent extends Component
{
    public $cartCount;

    protected $listeners = ['CartAddedUpdated'];

    public function CartAddedUpdated(){
        return Cart::count();
    }

    public function render()
    {
        $cartCount = $this->CartAddedUpdated();
        return view('livewire.frontend.cart.cart-count-component',compact('cartCount'));
    }
}
