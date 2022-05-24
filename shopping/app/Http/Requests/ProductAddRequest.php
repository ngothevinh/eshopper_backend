<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name'=>'bail|required|unique:products|max:255|min:10',
            'price'=>'required',
            'category_id'=>'required',
            'contents'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên sản phẩm không được trùng',
            'name.max' => 'Tên sản phẩm không được lớn hơn 255 kí tự',
            'name.min' => 'Tên sản phẩm không được nhỏ hơn 10 kí tự',
            'price.required' => 'Giá tiền không được để trống',
            'category_id.required' => 'Danh mục không được để trống',
            'contents.required' => 'Mô tả sản phẩm không được để trống',
        ];
    }
}
