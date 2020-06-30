<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSyndicate extends FormRequest
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
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(3);

        return [
            'fantasy_name'  => "required|min:3|max:100|unique:syndicates,fantasy_name,{$id},id",
            'social_reason' => "required|min:3|max:100|unique:syndicates,social_reason,{$id},id",
            'email' => "required|min:3|max:100|unique:syndicates,email,{$id},id",            
        ];
    }

    //para customizar as mensagens das validacoes
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
            'fantasy_name' => 'Nome Fantasia',
            'social_reason' => 'Razão Social'
        ];
    }
}
