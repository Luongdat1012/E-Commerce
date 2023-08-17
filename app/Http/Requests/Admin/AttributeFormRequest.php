<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AttributeFormRequest extends FormRequest
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
    public function rules(Request $request)
    {

        if ($request->attribute === 'size') {
            return [
                'attribute_size' => 'required',
                'size_slug' => 'unique:product_sizes,slug'
            ];
        } elseif ($request->attribute === 'color') {
            return [
                'attribute_color_name' => 'required',
                'color_slug' => 'unique:product_colors,slug'
            ];
        } elseif ($request->attribute == 0) {
            return [
                'attribute' => 'not_in:0',
            ];
        }
    }

    public function messages()
    {
        return [
            'attribute_size.required' => 'Tên size không được để trống',
            'size_slug.unique' => 'Tên size đã tồn tại',
            'attribute_color_name.required' => 'Tên màu không được để trống',
            'color_slug.unique' => 'Tên màu đã tồn tại',
            'attribute.not_in' => 'Vui lòng chọn thuộc tính'
        ];
    }
}
