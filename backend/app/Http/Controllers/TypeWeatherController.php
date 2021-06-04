<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TypeWeatherRequest;
use App\Models\TypeWeatherModel;

// protected TypeWeatherModel;

class TypeWeatherController extends Controller
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
        // return view('TypeWeather', [
        //     'title' => 'TypeWeather',
        //     'body' => 'TypeWeather.'
        // ]);

         

        // $items = DB::select('select * from types_weather where name = ?', [1]);
        
        // $record = TypeWeatherModel::all();  
        // return view('TypeWeather', compact('record'));

        return view('TypeWeather');

        // $TypeWeather = $this->TypeWeatherModel->selectRecord($name);
        // return view('TypeWeather.edit', compact('TypeWeatherModel'));
    }

    public function AddPage()
    {
        return view('TypeWeatherAdd', [
            'title' => '気象類型情報の追加画面'
        ]);
    }

    public function EditPage()
    {
        // $record = TypeWeatherModel::find($type_id);
        return view('TypeWeatherEdit');
    }

    public function Delete($type_id)
    {
        // $deleted_data = DB::delete('delete from types_weather where name =""');
    
        TypeWeatherModel::where('type_id', $type_id)->delete();
        return redirect()->route(TypeWeatherController.IndexPage)->with('success', '削除完了しました');
    }

    public function Add(TypeWeatherRequest $request)
    {
        // $inserted_data = DB::insert('insert into types_weather set name="温度",state="init"');
        $post = new TypeWeatherModel;
        $post->name = $request->name;
        $post->value_unit = $request->value_unit;
        $post->time_interval = $request->time_interval;
        $post->timestamps = false;
        $post->save();

        return redirect('http://127.0.0.1:10080/TypeWeather');
    }

    public function Edit(TypeWeatherRequest $request, $type_id)
    {

        // $updated_data = DB::update('update types_weather set name = "温度" where name = 8');
        $update = [
            'name' => $request->name,
            'value_unit' => $request->value_unit,
            'time_interval' => $request->time_interval
        ];
        TypeWeatherModel::where('type_id', $type_id)->update($update);
        return redirect('http://127.0.0.1:10080/TypeWeather')->with('success', '編集完了しました');;
    
    }

    public function ajax(TypeWeatherRequest $request)
    {
        // $host = 'localhost';
        // // データベース名
        // $dbname = 'shimizuGUI';
        // // ユーザー名
        // $dbuser = 'root';
        // // パスワード
        // $dbpass = 'secret';

        // // データベース接続クラスPDOのインスタンス$dbhを作成する
        // try {
        //     $dbh = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8mb4", $dbuser, $dbpass);
        // // PDOExceptionクラスのインスタンス$eからエラーメッセージを取得
        // } catch (PDOException $e) {
        //     // 接続できなかったらvar_dumpの後に処理を終了する
        //     var_dump($e->getMessage());
        //     exit;
        // }

        // // データ取得用SQL
        // // 値はバインドさせる
        // $sql = "SELECT type_id, name, value_unit, time_interval FROM types_weather";
        // // SQLをセット
        // $stmt = $dbh->prepare($sql);
        // // SQLを実行
        // $stmt->execute();

        // // あらかじめ配列$TypeWeatherListを作成する
        // // 受け取ったデータを配列に代入する
        // // 最終的にhtmlへ渡される
        // $TypeWeatherList = array();

        // // fetchメソッドでSQLの結果を取得
        // // 定数をPDO::FETCH_ASSOC:に指定すると連想配列で結果を取得できる
        // // 取得したデータを$TypeWeatherListへ代入する
        // while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        //     $TypeWeatherList[] = array(
        //         'type_id'    => $row['type_id'],
        //         'name'  => $row['name'],
        //         'value_unit' => $row['value_unit'],
        //         'time_interval' => $row['time_interval']
        //     );
        // }

        // // ヘッダーを指定することによりjsonの動作を安定させる
        // header('Content-type: application/json');
        // // htmlへ渡す配列$TypeWeatherListをjsonに変換する
        // echo json_encode($TypeWeatherList);

        
        // $selected_data = DB::table('types_weather')->get();
        // return view('TypeWeather', array('selected_data' => $selected_data));

        // $table = 'types_weather';

        // $primaryKey = 'type_id';
        
        // $columns = array(
        //     array( 'db' => 'type_id', 'dt' => 0 ),
        //     array( 'db' => 'name', 'dt' => 1 ),
        //     array( 'db' => 'value_unit',  'dt' => 2 ),
        //     array( 'db' => 'time_interval',   'dt' => 3 )
        // );
        
        // $sql_details = array(
        //     'user' => 'root',
        //     'pass' => 'secret',
        //     'db'   => 'shimizuGUI',
        //     'host' => 'localhost'
        // );

    
        // require( 'ssp.class.php' );
        
        // echo json_encode(
        //     SSP::simple( $_GET, $table, $primaryKey, $columns, $sql_details )
        // );
        $query = \App\Product::query();

        // 検索
        if($request->filled('search.value')) {

            $search_value = trim(
                mb_convert_kana($request->input('search.value'), 's')
            );
            $keywords = explode(' ', $search_value);

            foreach($keywords as $keyword) {

                $query->where('name', 'LIKE', '%'. $keyword .'%');

            }

        }

        // ソート
        if($request->filled('order.0.column')) {

            $order_column_index = $request->input('order.0.column');
            $order_column = $request->input('columns.'. $order_column_index .'.data');
            $order_direction = $request->input('order.0.dir');
            $query->orderBy($order_column, $order_direction);

        }

        $start = intval($request->start);
        $per_page = intval($request->length);
        $columns = [
            'type_id',
            'name',
            'value_unit',
            'time_interval'
        ];
        $current_page = ($per_page === 0) ? 1 : $start / $per_page + 1;
        return $query->paginate($per_page, $columns, '', $current_page);
    }

    // public function Select()
    // {
    //     $selected_data = DB::table('types_weather')->get();
    //     return view('TypeWeather', array('selected_data' => $selected_data));

    // <!-- <div>
    // @foreach ($selected_data as $data)
    //     @if(isset($data->name))
    //         <li>name:{{$data->name}}</li>
    //     @endif
    //  @endforeach
    // </div> -->
    // }
}