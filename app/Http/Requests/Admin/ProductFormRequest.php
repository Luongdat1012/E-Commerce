<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

class ProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'product_name' => 'required|unique:products,name,'.$this->product,
            'product_slug' => 'required|unique:products,slug,'.$this->product,
            'product_sku' => 'required|unique:products,sku,'.$this->product,
            'product_price' => 'required|numeric|min:0|not_in:0',
            'discount_number' => 'required|numeric|min:0|max:100',
            'sku' => [
                Rule::unique('product_detail')->where('product_id',$this->product),
            ]
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Tên sản phẩm không được để trống',
            'product_name.unique' => 'Tên sản phẩm đã tồn tại',
            'product_slug.required' => 'Slug không được để trống',
            'product_slug.unique' => 'Slug đã tồn tại',
            'product_sku.required' => 'Sku không được để trống',
            'product_sku.unique' => 'Sku đã tồn tại',
            'product_price.required' => 'Giá tiền không được để trống',
            'product_price.numeric' => 'Nhập sai giá tiền',
            'product_price.min' => 'Giá tiền phải lớn hơn 0',
            'product_price.not_in' => 'Giá tiền phải lớn hơn 0',
            'discount_number.required' => 'Giá khuyến mãi không được để trống',
            'discount_number.numeric' => 'Nhập sai khuyến mãi',
            'discount_number.min' => 'Giá khuyến mãi phải lớn hơn 0',
            'discount_number.max' => 'Giá khuyến mãi phải lớn hơn 0'
        ];
    }
}
