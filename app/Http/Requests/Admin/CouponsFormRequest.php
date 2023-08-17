<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CouponsFormRequest extends FormRequest
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
            'name' => 'required|min:6',
            'slug' => 'required|unique:coupons,slug,' . $this->coupon,
            'code' => 'required|min:6|unique:coupons,code,' . $this->coupon,
            'type' => 'required|not_in:0',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được để trống',
            'name.min' => 'Độ dài tối thiếu 6 ký tự',
            'slug.required' => 'Slug không được để trống',
            'slug.unique' => 'Slug đã tồn tại',
            'code.required' => 'Slug không được để trống',
            'code.unique' => 'Slug đã tồn tại',
            'code.min' => 'Độ dài tối thiếu 6 ký tự',
            'type.required' => 'Type không được để trống',
            'type.not_in' => 'Chưa chọn type',
            'value.required' => 'Value không được để trống',
            'value.numeric' => 'Nhập sai vui lòng nhập lại',
            'cart_value.required' => 'Value không được để trống',
            'cart_value.numeric' => 'Nhập sai vui lòng nhập lại',
            'expiry_date.required' => 'Expiry date không được để trống'
        ];
    }
}
