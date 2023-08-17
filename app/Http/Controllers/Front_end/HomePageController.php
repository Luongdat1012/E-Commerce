<?php

namespace App\Http\Controllers\Front_end;


use App\Http\Controllers\Controller;
use App\Http\Services\Font_end\ProductService;
use App\Models\Products;
use Brian2694\Toastr\Facades\Toastr;

class HomePageController extends Controller
{
    const LIMIT = 10;
    public $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = Products::where('active', 1)
            ->limit(self::LIMIT)
            ->orderByDesc('id')
            ->get();
        return view('front_end.home.HomePageMain', compact('products'));
    }
}
