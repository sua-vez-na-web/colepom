<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCategory extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $id = $this->segment(3);

        return [
            'name'  => "required|min:3|max:100|unique:categories,name,{$id},id",
            // 'role_id' => "required|integer",            
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'unique'      => 'O campo :attribute já está sendo usado',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            // 'role_id' => 'Categoria do Perfil'
        ];
    }
}
