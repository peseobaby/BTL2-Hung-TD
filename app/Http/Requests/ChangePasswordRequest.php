<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'oldpassword' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ];
    }
    public function messages()
    {
        return [
            'oldpassword.required' => 'Nhập lại mật khẩu cũ',
            'password.required' => 'Yêu cầu nhập mật khẩu',
            'password_confirmation.required' => 'Mật khẩu xác thực không đúng',
            'password_confirmation.same' => 'Mật khẩu xác thực không đúng',
        ];
    }
}
