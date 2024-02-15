<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestTask extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return  [
            'title' => "required|min:3|max:255",
            'description' => "required|min:3|max:1000",
        ];

    }

    public function messages(){
        return [
            'required' => 'Campo Obrigatorio',
            'title.min' => 'o minimo da senha é 8 caracters',
            'title.max' => 'o maximo do senha é 255 caracters',
        ];
    }
}
