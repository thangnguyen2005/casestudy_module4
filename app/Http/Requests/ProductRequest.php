<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:products,name,' . $this->route('id'),
            'slug' => 'required',
            'price' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'status' => 'required',
        ];
    }
    public function messages()
    {
        return
         [
            'name.required' => 'Bạn chưa nhập :attribute',
            'name.unique' => 'Đã tồn tại :attribute',
            'slug.required' => 'Bạn chưa nhập :attribute',
            'price.required' => 'Bạn chưa nhập :attribute',
            'description.required' => 'Bạn chưa nhập :attribute',
            'quantity.required' => 'Bạn chưa nhập :attribute',
         ];
    }
    public function attributes()
    {
        return [
            'name' => 'tên',
            'slug' => 'slug',
            'price' => 'giá',
            'description' => 'thông tin sản phẩm',
            'quantity' => 'số lượng',
        ];
    }
}
