<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Reserverequest extends FormRequest
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
            'kana' => 'required',
            'nmpeople' => 'required',
            'phonenumber' => 'required',
            'day' => 'required',
            'time' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '※入力必須です',
            'kana.required' => '※入力必須です',
            'nmpeople.required' => '※入力必須です',
            'phonenumber.required' => '※入力必須です',
            'day.required' => '※入力必須です。日付を選択してください。',
            'time.required' => '※入力必須です',
        ];
    }

}
