<?php

namespace App\Http\Livewire\Frontend\Home;

use App\Models\Products;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class HomeProductComponent extends Component
{
    const LIMIT = 10;

    public function render()
    {
        $products = Products::where('active', 1)
            ->limit(self::LIMIT)
            ->orderByDesc('id')
            ->get();
        return view('livewire.frontend.home.home-product-component', compact('products'));
    }
}
