<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ForecastControlRequest;
use App\Models\CustomersModel;
use App\Models\MlModelsModel;
use App\Models\ServicesModel;
use App\Models\TargetGroupsModel;

use Illuminate\Http\Request;

class ForecastControlController extends Controller
{
           /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function IndexPage()
    {
        // $record = ForecastControlModel::all();   

        return view('ForecastControl');

    }

    public function DetailPage()
    {
        // $record = ForecastControlModel::all();   

        return view('ForecastControlDetail');

    }

    public function AddPage1()
    {
        return view('ForecastControlAdd1', [
            'title' => '予測コントロールの追加画面１'
        ]);
    }

    public function AddPage2()
    {
        return view('ForecastControlAdd2', [
            'title' => '予測コントロールの追加画面2'
        ]);
    }

    public function AddPage3()
    {
        return view('ForecastControlAdd3', [
            'title' => '予測コントロールの追加画面3'
        ]);
    }

    public function AddPage4()
    {
        return view('ForecastControlAdd4', [
            'title' => '予測コントロールの追加画面4'
        ]);
    }

    public function EditPage1()
    {
        return view('ForecastControlEdit1', [
            'title' => '予測コントロールの変更画面１'
        ]);
    }

    public function EditPage2()
    {
        return view('ForecastControlEdit2', [
            'title' => '予測コントロールの変更画面2'
        ]);
    }

    public function EditPage3()
    {
        return view('ForecastControlEdit3', [
            'title' => '予測コントロールの変更画面3'
        ]);
    }

    public function EditPage4()
    {
        return view('ForecastControlEdit4', [
            'title' => '予測コントロールの変更画面4'
        ]);
    }

    // public function EditPage($target_type_id)
    // {
    //     $record = ForecastControlModel::find($target_type_id);
    //     return view('ForecastControlEdit', compact('record'));
    // }

    // public function Delete($target_type_id)
    // {
    //     ForecastControlModel::where('target_type_id', $target_type_id)->delete();
    //     return redirect()->route(ForecastControlController.IndexPage)->with('success', '削除完了しました');
    // }

    public function Add()
    {
    //     $post = new ForecastControlModel;
    //     $post->name = $request->name;
    //     $post->value_unit = $request->value_unit;
    //     $post->time_interval = $request->time_interval;
    //     $post->timestamps = false;
    //     $post->save();

        return redirect('http://127.0.0.1:10080/ForecastControl');

    }

    public function Edit()
    {
        // ForecastControlRequest $request, $target_type_id
        // $update = [
        //     'name' => $request->name,
        //     'value_unit' => $request->value_unit,
        //     'time_interval' => $request->time_interval
        // ];
        // ForecastControlModel::where('target_type_id', $target_type_id)->update($update);
        return redirect('http://127.0.0.1:10080/ForecastControl');
    
    }

    public function ShowDetail($model_id, $model_entity_id)
    {
        $model_detail = DB::table('ml_models')->where('model_id', $model_id)->get();

        $where  = array('model_id' => $model_id, 'model_entity_id'=>$model_entity_id);
        $model_entities_detail = DB::table('ml_models')->where($where)->get();

        return view('TypeWeather', array('model_detail' => $model_detail, 'model_entities_detail' => $model_entities_detail));
    }

}
