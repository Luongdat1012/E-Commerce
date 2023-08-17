<?php

namespace App\Http\Controllers\Front_end;

use App\Models\Categories;
use App\Http\Controllers\Controller;
use App\Http\Services\Admin\Category\CategoryService;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function productDetail($slug)
    {
        $product = Products::where('slug', $slug)->first();
//        $sumRating = array_reduce($product->reviews->toArray(), function ($previous, $current) {
//            return $previous + $current['rating'];
//        });
//        $avgRating = $sumRating / count($product->reviews);
        return view('front_end.product.ProductDetail', compact('product'));
    }

    public function productsCategory(Request $request)
    {
        $id = Categories::where('slug', $request->slug)->first()->id;
        $listParentCategory = Categories::whereIn('id', $this->categoryService->getParentId(Categories::all(), $id))->get();
        $listChildCategory = $this->categoryService->getChildCategories(Categories::all(), $id);
        $products = Products::where('category_id', $id)->orWhereIn('category_id', $listChildCategory)->get();
        return view('front_end.product.ProductsCategory', compact('products', 'listParentCategory'));
    }
}
