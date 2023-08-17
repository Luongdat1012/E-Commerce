<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Categories;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\PseudoTypes\Numeric_;

class CategoriesFormRequest extends FormRequest
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
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$this->category
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được để trống',
            'slug.required' => 'Slug không được để trống',
            'slug.unique' => 'Slug đã tồn tại'
        ];
    }
}
