<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomersServicesController extends Controller
{
    public function IndexPage()
    {
        // $record = ForecastControlModel::all();   

        return view('CustomersServices');

    }

    public function AddPage()
    {
        return view('CustomersServicesAdd', [
            'title' => '顧客利用サービスの追加画面'
        ]);
    }

    public function Add($object)
    {

    // $inserted_data = DB::insert('insert into types_weather set name="温度",state="init"');

    //     $post = new ForecastControlModel;
    //     $post->name = $request->name;
    //     $post->value_unit = $request->value_unit;
    //     $post->time_interval = $request->time_interval;
    //     $post->timestamps = false;
    //     $post->save();

        return redirect('http://127.0.0.1:10080/CustomersServices');

        // Book::create($request->all());
        // return redirect()->route('book.index')->with('success', '新規登録完了しました');

    }

    public function EditPage()
    {
        return view('CustomersServicesEdit', [
            'title' => '顧客利用サービスの変更画面'
        ]);
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
        return redirect('http://127.0.0.1:10080/CustomersServices');
    
    }
}
