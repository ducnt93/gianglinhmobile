<?php

namespace App\Http\Requests;

class CreateUserRequest extends Request
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
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Trường tên không được để trống',
            'username.max' => 'Tối đa là 255 ký tự',
            'password.min' => 'Tối thiểu là 6 ký tự',
            'email.required' => 'Trường email không được để trống',
            'email.email' => 'Định dạng email không đúng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Trường mật khẩu không được để trống',

        ];
    }
}
