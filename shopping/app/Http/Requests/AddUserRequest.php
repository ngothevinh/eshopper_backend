<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'email'=>'bail|required|unique:users|max:255',
            'name'=>'bail|required|max:255',
            'role_id'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email không được trùng',
            'email.max' => 'Email không được lớn hơn 255 kí tự',
            'name.required' => 'Tên không được để trống',
            'name.max' => 'Tên không được lớn hơn 255 kí tự',
            'role_id.required' => 'Chọn vai trò không được để trống',
        ];
    }
}
