<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreCatePost extends FormRequest
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
            ['cate_name'=>[
                'required',
                Rule::unique('cate')->ignore(request()->id,'cate_id'),
            ],
            ];
    }


    public function messages(){
        return [
            'cate_name.required'=>'分类名称必填',
            'cate_name.unique'=>'分类名称已存在',
        ];
    }

}
