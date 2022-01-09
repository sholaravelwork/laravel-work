<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Postrequest extends FormRequest
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
        return [
            'name' => 'required|min:2',
            'expla' => 'required',
            'img' => 'required',
            'price' => 'required | integer',
            'genre' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '※入力必須です',
            'expla.required' => '※入力必須です',
            'img.required' => '※選択必須です',
            'price.required' => '※入力必須です',
            'price.integer' => '※数字を入力してください',
            'genre.required' => '※入力必須です',
        ];
    }

}
