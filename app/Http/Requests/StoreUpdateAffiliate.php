<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateAffiliate extends FormRequest
{
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        $id = $this->segment(3);

        return [
            'first_name'  => "required|min:3|max:100|",
            'birth_of_date' => "required|date|",
            'document' => "required|min:3|max:100|unique:affiliates,document,{$id},id",
            'email' => "required|email|unique:affiliates",
        ];
    }
    
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'min'      => 'O campo :attribute é muito curto',
            'max'      => 'O campo :attribute exedeu a quantidade de caracteres',
            'unique'      => 'O campo :attribute já está sendo usado',
        ];
    }

    public function attributes()
    {
        return [
            'first_name' => 'Nome',
            'birth_of_date' => 'Data de nascimento'
        ];
    }
}
