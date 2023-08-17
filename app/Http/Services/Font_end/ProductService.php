<?php

namespace App\Http\Services\Font_end;

use App\Models\ProductDetail;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ProductService extends Component
{
    public function loadQickProduct(Request $request)
    {
        $id = $request->post('id');
        $product = Products::find($id);
        $html = '';
        if ($product) {
            $html = view('front_end.product.QuickViewProduct', compact('product'))->render();
            return response()->json([
                'html' => $html
            ]);
        }

        return $html;
    }

    public function checkProductQuantity(Request $request)
    {
        $productId = $request->post('productId');
        $color = $request->post('color');
        $size = $request->post('size');
        $productDetails = Products::find($productId)
            ->productDetails
            ->where('color_id', $color)
            ->where('size_id', $size)
            ->first();
        return response()->json([
            'quantity' => $productDetails->quantity,
            'message' => 'Hết sản phẩm'
        ]);
    }

    public function addToCart(Request $request)
    {
        $productQuantity = $request->productQuantity;
        $product = Products::find($request->productId);
        $productDetail = $product->productDetails
            ->where('color_id', $request->productAttribute['color'])
            ->where('size_id', $request->productAttribute['size'])
            ->first();
        $productAttribute = $request->productAttribute;
        if ($productQuantity <= $productDetail->quantity) {
            Cart::add([
                'id' => $productDetail->id,
                'name' => $product->name,
                'qty' => $productQuantity,
                'price' => $productDetail->price,
                'options' => $productAttribute,
            ])->associate($productDetail);
            $this->emit('CartAdded');
            return response()->json([
                'success' => 'done',
                'quantity' => Cart::count(),
            ]);
        } else {
            return response()->json([
                'url' => route('productDetail', $product->slug),
                'error' => 'Số lượng trong kho không đủ',
            ]);
        }
    }
}
