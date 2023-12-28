<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'email' => 'required' . $this->route('id'),
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return
         [
            'email.required' => 'Bạn chưa nhập :attribute',
            'password.required' => 'Bạn chưa nhập :attribute',
         ];
    }
    public function attributes()
    {
        return [
            'email' => 'email',
            'password' => 'mật khẩu',
        ];
    }
}
