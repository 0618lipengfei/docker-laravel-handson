<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TypesPreprocessRequest;
use App\Models\TypesPreprocessModel;

class TypesPreprocessController extends Controller
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
        $record = TypesPreprocessModel::all();   

        return view('TypesPreprocess', compact('record'));

    }

    public function AddPage()
    {
        return view('TypesPreprocessAdd', [
            'title' => '事前処理説明変数タイプの追加画面'
        ]);
    }

    public function EditPage()
    {
        return view('TypesPreprocessEdit');
    }

    public function Delete($preprocess_type_id)
    {
        TypesPreprocessModel::where('preprocess_type_id', $preprocess_type_id)->delete();
        return redirect()->route(TypesPreprocessController.IndexPage)->with('success', '削除完了しました');
    }

    public function Add(TypesPreprocessRequest $request)
    {
        $post = new TypesPreprocessModel;
        $post->name = $request->name;
        $post->formula = $request->formula;
        $post->description = $request->description;
        $post->timestamps = false;
        $post->save();

        return redirect('http://127.0.0.1:10080/TypesPreprocess');
    }

    public function Edit(TypesPreprocessRequest $request, $preprocess_type_id)
    {

        $update = [
            'name' => $request->name,
            'value_unit' => $request->value_unit,
            'time_interval' => $request->time_interval
        ];
        TypesPreprocessModel::where('preprocess_type_id', $preprocess_type_id)->update($update);
        return redirect('http://127.0.0.1:10080/TypesPreprocess')->with('success', '編集完了しました');;
    
    }

    public function Select()
    {
        $selected_data = DB::table('types_preprocess')->get();
        return view('TypesPreprocess', array('selected_data' => $selected_data));

    }
}
