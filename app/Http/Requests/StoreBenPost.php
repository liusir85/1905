<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreBenPost extends FormRequest
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
            ['ben_biao'=>[
                'required',
                Rule::unique('ben')->ignore(request()->id,'ben_id'),
            ],
                'ben_name' => 'required',
            ];
    }


    public function messages(){
        return [
            'ben_biao.required'=>'文章标题必填',
            'ben_biao.unique'=>'文章标题已存在',
            'ben_name.required'=>'文章作者必填'
        ];
    }

}
