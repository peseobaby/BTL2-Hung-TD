<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class SendRequest extends FormRequest
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
            'id' => 'required',
            'money' => 'required',
            'password' => ['required', function ($attribute, $password, $fails) {
                                        if(!Hash::check($password, Auth::user()->password)) {
                                            $fails('Mật khẩu không đúng');
                                            }
                                        }],
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên ví không được để trống',
            'id.required' => 'Số tài khoản không được để trống',
            'money.required' => 'Nhập số tiền cần chuyển',
            'password.required' => 'Yêu cầu nhập mật khẩu',
            'password_confirmation.required' => 'Mật khẩu xác thực không đúng',
            'password_confirmation.same' => 'Mật khẩu xác thực không đúng',
        ];
    }
}
