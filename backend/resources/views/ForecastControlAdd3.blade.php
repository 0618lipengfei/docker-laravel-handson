<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>予測コントロールの追加画面（3/4）</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/jszip-2.5.0/dt-1.10.24/af-2.3.6/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/cr-1.5.3/date-1.0.3/fc-3.3.2/fh-3.1.8/kt-2.6.1/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.3/datatables.min.css"/>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/jszip-2.5.0/dt-1.10.24/af-2.3.6/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/cr-1.5.3/date-1.0.3/fc-3.3.2/fh-3.1.8/kt-2.6.1/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.3/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            // デフォルトの設定を変更
            $.extend( $.fn.dataTable.defaults, { 
                language: {
                    url: "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Japanese.json"
                } 
            });

            $('#ModelEntityTable').DataTable( {
                // "columnDefs": [
                //     {
                //         "targets": [ 0 ],
                //         "visible": false,
                //         "searchable": false
                //     }
                // ],
            
                // "processing": true,
                // "serverSide": true,
                // "ajax": "TypeWeather.php",

                "scrollY":        "200px",
                "scrollX": true,
                "scrollCollapse": true,
                "paging":         false

            } );


            var table = $('#ModelEntityTable').DataTable();

            $('#ModelEntityTable tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }

                // table.rows('.selected').data();
            } );

            $('#apply_button').click( function () {
                var selected_data = table.rows('.selected').data();
                document.add_form.model_entity.value = selected_data[0][0];
                // alert( selected_data[0][0]+"が選択された。");
            } );

            $('#next').click( function () {
                var query = location.search;
                var values = query.split('&');
                var target_group_value = values[0].split('=');
                var model_value = values[1].split('=');

                var selected_data = table.rows('.selected').data();
                window.location.href = 'http://127.0.0.1:10080/ForecastControl/Add4?target_group=' 
                +  encodeURIComponent(decodeURIComponent(target_group_value[1])) + 
                '&model=' +  encodeURIComponent(decodeURIComponent(model_value[1])) + 
                '&model_entity=' +  encodeURIComponent(selected_data[0][0]);
                // alert( selected_data[0][0]+"が選択された。");
            } );

        } );

        window.onload = function ()
        {
            var query = location.search;
            var values = query.split('&');
            // alert(values[0]+" / "+values[1]);
            var target_group_value = values[0].split('=');
            var model_value = values[1].split('=');
            // alert(target_group_value+" / "+model_value);

            var obj_target_group = document.getElementById("target_group");
            var obj_model = document.getElementById("model");
            // obj.placeholder = "test";
            obj_target_group.value = decodeURIComponent(target_group_value[1]);
            obj_model.value = decodeURIComponent(model_value[1]);
        }
    </script>
  </head>

  <body>
    <h1>予測コントロール</h1>
    <h2>サービスの予測対象　追加画面（3/4）</h2>

    @if($message = Session::get('success'))
    <p>{{ $message }}</p>
    @endif

    <form id="add_form" name="add_form" method="POST">
      @csrf
      <div>対象グループ：<input id="target_group" style="width: 20em;" type="text" name="target_group" disabled="disabled"> </div>
      <div>モデル：<input id="model" style="width: 20em;" type="text" name="model" disabled="disabled"></div>      
      <div><b>モデルエンティティ：</b><input id="model_entity" style="width: 20em;" type="text" name="model_entity" readonly="readonly" placeholder="モデルエンティティを選択してください"></div>
      
      <div align="middle"><input id="apply_button" type="button" style="width: 10em;" name="apply_button" value="適用"></div>

      <div class="container">
        <table id="ModelEntityTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>モデルエンティティ</th>
                    <th>モデル</th>                    
                    <th>パス</th>
                    <th>最大エポック</th>
                    <th>学習率</th>
                    <th>早期打ち切りpatience値</th>
                    <th>最適化アルゴリズム</th>
                    <th>損失関数</th>
                    <th>評価関数</th>
                    <th>前回訓練時刻</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>test001</td>
                    <td>test001</td>
                    <td>test001</td>
                    <td>test001</td>
                    <td>test001</td>
                    <td>test001</td>
                    <td>test001</td>
                    <td>test001</td>
                    <td>test001</td>
                    <td>test001</td>
                </tr>
                <tr>
                    <td>test002</td>
                    <td>test002</td>
                    <td>test002</td>
                    <td>test002</td>
                    <td>test002</td>
                    <td>test002</td>
                    <td>test002</td>
                    <td>test002</td>
                    <td>test002</td>
                    <td>test002</td>
                </tr>
                <tr>
                    <td>test003</td>
                    <td>test003</td>
                    <td>test003</td>
                    <td>test003</td>
                    <td>test003</td>
                    <td>test003</td>
                    <td>test003</td>
                    <td>test003</td>
                    <td>test003</td>
                    <td>test003</td>
                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <th>モデルエンティティ</th>
                    <th>モデル</th>                    
                    <th>パス</th>
                    <th>最大エポック</th>
                    <th>学習率</th>
                    <th>早期打ち切りpatience値</th>
                    <th>最適化アルゴリズム</th>
                    <th>損失関数</th>
                    <th>評価関数</th>
                    <th>前回訓練時刻</th>
                </tr>
            </tfoot>
        </table>
    </div>
      
      <div align="right">
          <input type="button" style="width: 10em;" id="next" name="next" value="次ぎ">
          <!-- <input type="button" style="width: 10em;" name="back" value="戻る" onclick="location.href='http://127.0.0.1:10080/ForecastControl/Add2'"> -->
          <input type="button" style="width: 10em;" name="cancel" value="キャンセル" onclick="location.href='http://127.0.0.1:10080/ForecastControl'">
      </div>
    </form>
  </body>
</html>