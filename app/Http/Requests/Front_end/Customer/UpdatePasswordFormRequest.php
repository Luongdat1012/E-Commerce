<?php

namespace App\Http\Requests\Front_end\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UpdatePasswordFormRequest extends FormRequest
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
            'currentPassword' => 'required',
            'newPassword' => 'required|confirmed|different:currentPassword|min:8',
        ];
    }

    public function messages()
    {
        return [
            'currentPassword.required' => 'Mật khẩu không được để trống',
            'newPassword.required' => 'Mật khẩu không được để trống',
            'newPassword.confirmed' => 'Mật khẩu không trùng khớp',
            'newPassword.different' => 'Mật khẩu mới trùng mật khẩu cũ',
            'newPassword.min' => 'Mật khẩu tối thiểu 8 ký tự'];
    }
}
