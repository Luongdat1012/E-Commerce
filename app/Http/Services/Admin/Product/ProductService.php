<?php

namespace App\Http\Services\Admin\Product;


use App\Models\Gallery;
use App\Models\ProductColor;
use App\Models\ProductDetail;
use App\Models\Products;
use App\Models\ProductSize;
use Illuminate\Support\Facades\Session;

class ProductService
{
    public function create($request)
    {
        try {
            $product = Products::insertGetId([
                'name' => $request->product_name,
                'slug' => $request->product_slug,
                'sku' => $request->product_sku,
                'description' => $request->product_description,
                'content' => $request->product_content,
                'category_id' => $request->product_category,
                'price' => $request->product_price,
                'discount_number' => $request->discount_number,
                'active' => $request->product_active ?? 0,
                'photo' => str_replace(url('uploads') . '/', '', $request->product_image),
                'product_att_status' => $request->product_att_status,
                'att_products' => json_encode([
                    'colors' => array_unique($request->product_color),
                    'sizes' => array_unique($request->product_size)
                ])
            ]);

//           Save images
            if (!empty($request->product_images)) {
                $images = explode(',', $request->product_images);
                foreach ($images as $value) {
                    Gallery::create([
                        'product_id' => $product,
                        'name' => str_replace(url('uploads') . '/', '', $value)
                    ]);
                }
            }
            for ($i = 0; $i < count($request->products_sku_value); $i++) {
                ProductDetail::create([
                    'product_id' => $product,
                    'price' => $request->products_price_value[$i],
                    'sku' => $request->products_sku_value[$i],
                    'color_id' => $request->product_color[$i],
                    'size_id' => $request->product_size[$i],
                    'quantity' => $request->products_qty_value[$i]
                ]);
            }
            Session::flash('success', 'Thêm mới sản phẩm thành công thành công');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function update($request, $id)
    {
        try {
            Products::where('id', $id)->update([
                'name' => $request->product_name,
                'slug' => $request->product_slug,
                'sku' => $request->product_sku,
                'description' => $request->product_description,
                'content' => $request->product_content,
                'category_id' => $request->product_category,
                'price' => $request->product_price,
                'discount_number' => $request->discount_number,
                'active' => $request->product_active ?? 0,
                'photo' => !strpos($request->product_image, url('uploads')) ? str_replace(url('uploads') . '/', '', $request->product_image) : $request->product_image,
                'att_products' => json_encode([
                    'colors' => array_unique($request->product_color),
                    'sizes' => array_unique($request->product_size)
                ])
            ]);

//           Update images
            if (!empty($request->product_images)) {
                Gallery::where('product_id', $id)->delete();
                $images = explode(',', $request->product_images);
                foreach ($images as $value) {
                    Gallery::create([
                        'product_id' => $id,
                        'name' => !strpos($value, url('uploads')) ? str_replace(url('uploads') . '/', '', $value) : $value
                    ]);
                }
            }

//            Update product_detail
            if (!empty($request->products_sku_value) && $request->product_att_status == 1) {
                ProductDetail::where('product_id', $id)->delete();
                for ($i = 0; $i < count($request->products_sku_value); $i++) {
                    ProductDetail::create([
                        'product_id' => $id,
                        'price' => $request->products_price_value[$i],
                        'sku' => $request->products_sku_value[$i],
                        'color_id' => $request->product_color[$i],
                        'size_id' => $request->product_size[$i],
                        'quantity' => $request->products_qty_value[$i]
                    ]);
                }
            }
            Session::flash('success', 'Sửa sản phẩm thành công thành công');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            Products::find($id)->delete();
            Session::flash('success', 'Xóa sản phẩm thành công thành công');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function getColor($id)
    {
        return ProductColor::where('id', $id)->first()->name;
    }

    public function getSize($id)
    {
        return ProductSize::where('id', $id)->first()->name;
    }


}
