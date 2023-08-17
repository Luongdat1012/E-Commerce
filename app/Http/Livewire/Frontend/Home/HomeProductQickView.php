<?php

namespace App\Http\Livewire\Frontend\Home;

use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class HomeProductQickView extends Component
{

    public function decreaseQuantity(){
        return 1;
    }
    public function render()
    {
        return view('livewire.frontend.home.home-product-qick-view');
    }
}
