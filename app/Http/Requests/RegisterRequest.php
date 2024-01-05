<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'email' => 'required|unique:customers,email',
            'address' => 'required',
            'name' => 'required',
            'phone' => 'required|unique:customers,phone',


        ];
    }
    public function messages()
    {
        return
         [
            'email.required' => 'Bạn chưa nhập :attribute',
            'email.unique' => 'Đã tồn tại :attribute',
            'name.required' => 'Bạn chưa nhập :attribute',
            'address.required' => 'Bạn chưa nhập :attribute',
            'phone.required' => 'Bạn chưa nhập :attribute',
            'phone.unique' => 'Đã tồn tại :attribute',
         ];
    }
    public function attributes()
    {
        return [
            'name' => 'tên',
            'email' => 'email',
            'phone' => 'số điện thoại',
            'address' => 'địa chỉ',
        ];
    }
}
