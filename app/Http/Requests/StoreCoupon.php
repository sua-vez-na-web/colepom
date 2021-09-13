<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCoupon extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {

        return [
            'code'  => "required|min:3|max:100|unique:coupons",      
            'discount'  => "required|min:1|max:100|int",      
            'promotion_id'  => "required",      
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'unique'      => 'O campo :attribute já está sendo usado',
            'code.unique' => 'Este codigo já existe',
            'discount.integer' => 'O campo do valor de desconto precisa ser inteiro'
        ];
    }

    public function attributes()
    {
        return [
            'id' => 'id',
            'code' => 'code',
            'promotion_id' => 'promotion_id',
            'discount' => 'discount',
        ];
    }
}
