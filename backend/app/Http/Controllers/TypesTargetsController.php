<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TypesTargetsRequest;
use App\Models\TypesTargetsModel;

class TypesTargetsController extends Controller
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
        $record = TypesTargetsModel::all();   

        return view('TypesTargets', compact('record'));

    }

    public function AddPage()
    {
        return view('TypesTargetsAdd', [
            'title' => '予測対象タイプの追加画面'
        ]);
    }

    public function EditPage()
    {
        return view('TypesTargetsEdit');
    }

    public function Delete($target_type_id)
    {
        // $selected_data = table.rows('.selected').data();
        // $target_type_id = $selected_data[0][0];

        // // table.row('.selected').remove().draw( false );
        // alert( selected_data[0]+"が削除された。");
        TypesTargetsModel::where('target_type_id', $target_type_id)->delete();
        return redirect()->route(TypesTargetsController.IndexPage)->with('success', '削除完了しました');
    }

    public function Add(TypesTargetsRequest $request)
    {
        $post = new TypesTargetsModel;
        $post->name = $request->name;
        $post->value_unit = $request->value_unit;
        $post->time_interval = $request->time_interval;
        $post->timestamps = false;
        $post->save();

        return redirect('http://127.0.0.1:10080/TypesTargets');
    }

    public function Edit(TypesTargetsRequest $request)
    {
        $target_type_id = 4;
        $update = [
            'name' => $request->name,
            'value_unit' => $request->value_unit,
            'time_interval' => $request->time_interval
        ];
        TypesTargetsModel::where('target_type_id', $target_type_id)->update($update);
        return redirect('http://127.0.0.1:10080/TypesTargets')->with('success', '編集完了しました');
    
    }

    // public function Select()
    // {
    //     $selected_data = DB::table('types_targets')->get();
    //     return view('TypesTargets', array('selected_data' => $selected_data));

    // }
}
