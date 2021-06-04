<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeWeatherRequest extends FormRequest
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
            'value_unit' => 'required',
            'time_interval' => 'required',
        ];
    }

    public function message()
    {
        return [
            'name.required' => '気象データ名を入力してください',
            'value_unit.required' => '気象単位を入力してください',
            'time_interval.required' => '時間間隔を入力してください',
        ];
    }
}
