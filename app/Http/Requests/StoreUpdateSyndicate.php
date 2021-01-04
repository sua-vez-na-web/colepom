<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSyndicate extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $id = $this->segment(3);

        return [
            'name'  => "required|min:3|max:100|unique:syndicates,name,{$id},id",
            // 'president_name' => "required|min:3|max:100|unique:syndicates,president_name,{$id},id",
            'email' => "required|min:3|max:100|unique:syndicates,email,{$id},id",
            // 'phone' => 'required',
            'mobile_phone' => 'required',
            'cpf_cnpj' => "required|min:3|max:100|unique:syndicates,email,{$id},id",
            'zipcode' => "required",
            'address' => "required",
            'address_number' => "required",
            'city' => "required",
            'province' => "required",
            'password' => 'required|confirmed|min:6'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'min'      => 'O campo :attribute é muito curto',
            'max'      => 'O campo :attribute exedeu a quantidade de caracteres',
            'unique'   => 'O campo :attribute já está sendo usado',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome',
            'president_name' => 'Presidente',
            'phone' => 'Telefone',
            'mobile_phone' => 'Telefone Movel',
            'cpf_cnpj' => "cpf ou cnpj",
            'zipcode' => "cep",
            'address' => "endereco",
            'address_number' => "numero do endereco",
            'city' => "cidade",
            'province' => "bairro",
            "username" => 'Usuário',
            'password' => "Senha"
        ];
    }
}
