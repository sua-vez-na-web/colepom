<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {

        return [
            'title'  => "required|max:191|string",      
            'body'  => "required",      
            'link'  => "required",      
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório'
        ];
    }

    public function attributes()
    {
        return [
            'id' => 'id',
            'title' => 'Título',
            'body' => 'Notícia',
        ];
    }
}
