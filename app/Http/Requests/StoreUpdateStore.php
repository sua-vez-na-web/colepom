<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateStore extends FormRequest
{
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        $id = $this->segment(3);

        return [
            'name'  => "required|min:3|max:100|unique:stores,name,{$id},id",
            'zip_code' => "required",           
            'phone' => "required"
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
            'name' => 'Nome',
            'zip_code' => 'codigo postal ou cep',
            'phone' => 'Telefone',
            'partner_id' => 'Codigo Parceiro',
            'syndicate_id' => 'Codigo do Sindicato/Associacao'
        ];
    }
}
