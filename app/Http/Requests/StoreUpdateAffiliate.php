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
            'syndicate_id' => 'required',
            'first_name'  => "required|min:3|max:100",
            'last_name'  => "required|min:3|max:100",
            'company'  => "required|min:3|max:100",
            'job_post'  => "required|min:3|max:100",
            'birth_of_date' => "required|date",
            'document' => "required|min:3|max:100|unique:affiliates,document,{$id},id",
            'email' => 'required|email|unique:affiliates',
            'zipcode' => 'required',
            'address' => 'required',
            'address_number' => 'required',
            'city' => 'required',
            'province' => 'required',
            'password' => 'required|confirmed|min:6'
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
            'syndicate_id' => 'Sindicato',
            'first_name' => 'Nome',
            'last_name' => 'Sobrenome',
            'birth_of_date' => 'Data de nascimento',
            'zipcode' => 'Cep',
            'company' => 'empresa',
            'job_post' => 'cargo ou ocupacção',
            'document' => 'CPF',
            'address' => 'Rua',
            'address_number' => 'Número',
            'city' => 'Cidade',
            'province' => 'Bairro',
            'password' => "Senha"
        ];
    }
}
