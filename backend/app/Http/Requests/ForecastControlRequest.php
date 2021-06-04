<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForecastControlRequest extends FormRequest
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
            'target_group_name' => 'required',
            'model' => 'required',
            'time_interval' => 'required',
            'daily_forecasting_time' => 'required',
            'training_interval_days' => 'required',
            'training_data_days' => 'required',
        ];
    }

    public function message()
    {
        return [
            'target_group_name.required' => 'ターゲットグループ名を選択してください',
            'model.required' => 'モデルを選択してください',
            'model_entity.required' => 'モデルエンティティを選択してください',
            'daily_forecasting_time.required' => '日ごと予測実行時刻を入力してください',
            'training_interval_days.required' => '再訓練実行時間間隔を入力してください',
            'training_data_days.required' => '再訓練用訓練データ量を入力してください',
        ];
    }
}
