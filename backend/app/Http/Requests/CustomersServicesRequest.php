<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomersServicesRequest extends FormRequest
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
            'mode' => 'required',
            'active' => 'required',
            'date_start' => 'required',
            'date_end_free' => 'required',
            'date_end_schedule' => 'required',
            'date_end_finalized' => 'required',
            'date_update_last' => 'required',
            'date_update_next' => 'required',
        ];
    }

    public function message()
    {
        return [
            'mode.required' => 'モードを選択してください',
            'active.required' => '稼働状況を選択してください',
            'date_start.required' => '利用開始日を選択してください',
            'date_end_free.required' => '試用終了日を選択してください',
            'date_end_schedule.required' => '終了予定日を選択してください',
            'date_end_finalized.required' => '利用終了日を選択してください',
            'date_update_last.required' => '前回契約更新を選択してください',
            'date_update_next.required' => '次回契約更新を選択してください',
        ];
    }
}
