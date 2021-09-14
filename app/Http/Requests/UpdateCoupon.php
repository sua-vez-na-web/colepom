<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCoupon extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {

        return [
            'code'  => "required|min:3|max:100|unique:coupons"
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'unique'      => 'O campo :attribute já está sendo usado',
            'code.unique' => 'Este codigo já existe',
        ];
    }

    public function attributes()
    {
        return [
            'id' => 'id',
            'code' => 'codigo',
            'promotion_id' => 'promoção',
            'discount' => 'desconto',
        ];
    }
}
