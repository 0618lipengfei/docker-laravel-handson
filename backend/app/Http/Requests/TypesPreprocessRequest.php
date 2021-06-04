<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypesPreprocessRequest extends FormRequest
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
            'name' => 'required',
            'formula' => 'required',
            'description' => 'required',
        ];
    }

    public function message()
    {
        return [
            'name.required' => 'タイプ名を入力してください',
            'formula.required' => '数式を入力してください',
            'description.required' => '詳細を入力してください',
        ];
    }
}
