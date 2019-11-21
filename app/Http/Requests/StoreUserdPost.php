<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreUserdPost extends FormRequest
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
     *第二种验证
     * @return array
     */
    public function rules()
    {
//        echo request()->id;die;
        return
//            'brand_name' => 'required|unique:brand',
            ['admins_name'=>[
                'required',
                Rule::unique('admins')->ignore(request()->id,'admins_id'),
            ],
                'admins_email' => 'required',
            ];
    }


    public function messages(){
        return [
            'admins_name.required'=>'用户名必填',
            'admins_name.unique'=>'用户名已存在',
            'admins_email.required'=>'邮箱必填'
        ];
    }

}
