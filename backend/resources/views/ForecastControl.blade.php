<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>予測コントロール</title>
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

            $('#ForecastListTable').DataTable( {
                "columnDefs": [
                    {
                        "targets": [ 0 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 5 ],
                        "data": null,
                        "defaultContent": "<button>詳細</button>"
                    }
                ],
            
                // "processing": true,
                // "serverSide": true,
                // "ajax": "TypeWeather.php",

                "scrollY":        "200px",
                "scrollX": true,
                "scrollCollapse": true,
                "paging":         false

            } );

            

            var table = $('#ForecastListTable').DataTable();
 
            $('#ForecastListTable tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }

                // table.rows('.selected').data();
            } );

            $('#DeleteButton').click( function () {
                table.row('.selected').remove().draw( false );
            } );


            $('#ForecastListTable tbody').on( 'click', 'button', function () {
                var data = table.row( $(this).parents('tr') ).data();
                window.open( 'http://127.0.0.1:10080/ForecastControl/Detail?target_group=' 
                + data[2] + 
                '&model=' + data[3] + 
                '&model_entity=' + data[4], 'sample', 'top=200,left=200,width=600,height=400');
            } );

            $('#edit').click( function () {
                var selected_data = table.rows('.selected').data();
                window.location.href = 'http://127.0.0.1:10080/ForecastControl/Edit1?target_group=' 
                +  encodeURIComponent(selected_data[0][2]) + 
                '&model=' +  encodeURIComponent(selected_data[0][3]) + 
                '&model_entity=' +  encodeURIComponent(selected_data[0][4]) +
                '&daily_forecasting_time=' +  encodeURIComponent(selected_data[0][6]) +
                '&training_interval_days=' +  encodeURIComponent(selected_data[0][7]) +
                '&training_data_days=' +  encodeURIComponent(selected_data[0][8]);
            } );
            

        } );
    </script>
</head>

<body>
    <h1>予測コントロールの一覧画面</h1>


    <div>
        <div align="left">
            <input type="button" style="width: 20em;" name="add" value="追加" onclick="location.href='http://127.0.0.1:10080/ForecastControl/Add1'">
            <input type="button" style="width: 20em;" id="edit" name="edit" value="編集">
        </div>
        
        <div align="right" >
            <button id="DeleteButton" style="width: 20em;" >削除</button>
        </div>
    </div>
    <br>
    <div>
        <div align="left">
            <label for="search_option">ユーザー様：</label>
            <label for="search_keyword">予測対象一覧</label>
        </div>
        <!-- <div align="right">
            <label for="search_option">検索項目</label>
            <label for="search_keyword">検索キーワード</label>
        </div> -->
    </div>
        
    <!-- <div align="right">
        <select name="search_option" id="search_option" style="width: 20em;">
            <?php
            // $time_interval = array('全文検索', '気象データ名', '気象単位', '時間間隔');
            
            // print('<option value=0>全文検索</option>');
            // print('<option value=1>気象データ名</option>');
            // print('<option value=2>気象単位</option>');
            // print('<option value=3>時間間隔</option>');
            ?>
            </select>
        <input style="width: 20em;" type="text" name="search_keyword">
        <input type="button" style="width: 20em;" name="search" value="検索">
    </div> -->

    <div class="container">
        <table id="ForecastListTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>予測対象</th>
                    <th>サービス</th>
                    <th>対象グループ</th>
                    <th>モデル</th>
                    <th>適用中モデルエンティティ番号</th>
                    <th>詳細</th>
                    <th>日ごと予測実行時刻</th>
                    <th>再訓練実行時間間隔</th>
                    <th>再訓練用訓練データ量</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>test001</td>
                    <td>test001</td>
                    <td>test001</td>
                    <td>test001</td>
                    <td>test001</td>
                    <td></td>
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
                    <td></td>
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
                    <td></td>
                    <td>test003</td>
                    <td>test003</td>
                    <td>test003</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>予測対象</th>
                    <th>サービス</th>
                    <th>対象グループ</th>
                    <th>モデル</th>
                    <th>適用中モデルエンティティ番号</th>
                    <th>詳細</th>
                    <th>日ごと予測実行時刻</th>
                    <th>再訓練実行時間間隔</th>
                    <th>再訓練用訓練データ量</th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>