<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePartner extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $id = $this->segment(3);
        if($this->segment(1) == 'admin'){
            return [
                'name'  => "required|min:3|max:100|unique:partners,name,{$id},id",
                // 'social_reason' => "required|min:3|max:100|unique:partners,social_reason,{$id},id",
                'email' => "required|min:3|max:100|unique:partners,email,{$id},id",
                // 'phone' => 'required',
                'mobile_phone' => 'required',
                'cpf_cnpj' => "required|min:3|max:100|unique:partners,cpf_cnpj,{$id},id",
                'zipcode' => "required",
                'address' => "required",
                'address_number' => "required",
                'city' => "required",
                'province' => "required",
                // 'username' => "required|min:3|max:10|unique:users,name",
                //'password' => "confirmed|required|min:8"
            ];
        }else{
            return [
                'name'  => "required|min:3|max:100|unique:partners,name,{$id},id",
                // 'social_reason' => "required|min:3|max:100|unique:partners,social_reason,{$id},id",
                'email' => "required|min:3|max:100|unique:partners,email,{$id},id",
                // 'phone' => 'required',
                'mobile_phone' => 'required',
                'cpf_cnpj' => "required|min:3|max:100|unique:partners,cpf_cnpj,{$id},id",
                'zipcode' => "required",
                'address' => "required",
                'address_number' => "required",
                'city' => "required",
                'province' => "required",
                // 'username' => "required|min:3|max:10|unique:users,name",
                'password' => "confirmed|required|min:8"
            ];
        }

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
            'name' => 'Nome Fantasia',
            'social_reason' => 'Razão Social',
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
