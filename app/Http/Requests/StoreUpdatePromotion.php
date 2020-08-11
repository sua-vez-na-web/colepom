<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePromotion extends FormRequest
{
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        $id = $this->segment(3);

        return [
            'code'  => "required|unique:promotions,code,{$id},id",
            'title' => "required|min:3|max:100",
            'due_date' => "required|date|",            
            'amount' => "required|numeric",                    
        ];
    }
    
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'min'      => 'O campo :attribute é muito curto',
            'max'      => 'O campo :attribute exedeu a quantidade de caracteres',
            'unique'      => 'O campo :attribute já está sendo usado',
            'date'      => 'O campo :attribute não é uma data válida',
            'numeric'      => 'O campo :attribute incorreto',
        ];
    }

    public function attributes()
    {
        return [
            'code' => 'Codigo',
            'title' => 'Título',
            'due_date' => 'Vencimento',
            'amount' => 'Valor Desconto'
        ];
    }
}
