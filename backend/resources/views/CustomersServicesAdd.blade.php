<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>顧客利用サービスの追加画面</title>
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

            $('#ServicesListTable').DataTable( {
                // "columnDefs": [
                //     {
                //         "targets": [ 11 ],
                //         "data": null,
                //         "defaultContent": "<button>詳細</button>"
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


            var service_list_table = $('#ServicesListTable').DataTable();

            $('#ServicesListTable tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    service_list_table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }

                // table.rows('.selected').data();
            } );
            

            $('#PickUpListTable').DataTable( {
                // "columnDefs": [
                //     {
                //         "targets": [ 11 ],
                //         "data": null,
                //         "defaultContent": "<button>詳細</button>"
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
            var pickup_list_table = $('#PickUpListTable').DataTable();

            $('#PickUpListTable tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    pickup_list_table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }

                // table.rows('.selected').data();
            } );
            
            // var selected_data = "";

            $('#pick_button').click( function () {
                var selected_data = service_list_table.rows('.selected').data();
                pickup_list_table.row.add( [
                    selected_data[0][0],
                    selected_data[0][1],
                    selected_data[0][2],
                    selected_data[0][3],
                    selected_data[0][4],
                    selected_data[0][5],
                    selected_data[0][6],
                    selected_data[0][7],
                    selected_data[0][8],
                    selected_data[0][9],
                    selected_data[0][10],
                    selected_data[0][11],
                ] ).draw( false );
                
                service_list_table.row('.selected').remove().draw( false );
            } );
            $('#unpick_button').click( function () {
                var selected_data = pickup_list_table.rows('.selected').data();
                service_list_table.row.add( [
                    selected_data[0][0],
                    selected_data[0][1],
                    selected_data[0][2],
                    selected_data[0][3],
                    selected_data[0][4],
                    selected_data[0][5],
                    selected_data[0][6],
                    selected_data[0][7],
                    selected_data[0][8],
                    selected_data[0][9],
                    selected_data[0][10],
                    selected_data[0][11],
                ] ).draw( false );
                pickup_list_table.row('.selected').remove().draw( false );
            } );


            $('#submit').click( function () {
                var selected_data = pickup_list_table.rows().data();
                alert( selected_data[0]+"が選択された。");
            } );
        } );
    </script>
  
  </head>

  <body>
    <h1>顧客利用サービス</h1>
    <h2>サービス追加画面</h2>
    @if($message = Session::get('success'))
    <p>{{ $message }}</p>
    @endif

    <form method="POST">
        @csrf
        <div class="container">選択サービス一覧：
            <table id="ServicesListTable" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>サービス</th>
                        <th>時間単位</th>
                        <th>対象</th>
                        <th>予測期間</th>
                        <th>実績データ使用</th>
                        <th>日射量データ使用</th>
                        <th>温度データ使用</th>
                        <th>湿度データ使用</th>
                        <th>休日情報使用</th>
                        <th>イベント情報使用</th>
                        <th>詳細</th>
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
                    <td>test001</td>
                    <td></td>
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
                    <td>test002</td>
                    <td></td>
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
                    <td>test003</td>
                    <td></td>
                </tr>
            </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>サービス</th>
                        <th>時間単位</th>
                        <th>対象</th>
                        <th>予測期間</th>
                        <th>実績データ使用</th>
                        <th>日射量データ使用</th>
                        <th>温度データ使用</th>
                        <th>湿度データ使用</th>
                        <th>休日情報使用</th>
                        <th>イベント情報使用</th>
                        <th>詳細</th>
                    </tr>
                </tfoot>
            </table>
        </div>
      
        <div align="middle">
            <input id="pick_button" type="button" style="width: 10em;" name="pick_button" value="選定">
            <input id="unpick_button" type="button" style="width: 10em;" name="unpick_button" value="取消">
        </div>

        <div class="container">選択サービス一覧：
            <table id="PickUpListTable" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>サービス</th>
                        <th>時間単位</th>
                        <th>対象</th>
                        <th>予測期間</th>
                        <th>実績データ使用</th>
                        <th>日射量データ使用</th>
                        <th>温度データ使用</th>
                        <th>湿度データ使用</th>
                        <th>休日情報使用</th>
                        <th>イベント情報使用</th>
                        <th>詳細</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>サービス</th>
                        <th>時間単位</th>
                        <th>対象</th>
                        <th>予測期間</th>
                        <th>実績データ使用</th>
                        <th>日射量データ使用</th>
                        <th>温度データ使用</th>
                        <th>湿度データ使用</th>
                        <th>休日情報使用</th>
                        <th>イベント情報使用</th>
                        <th>詳細</th>
                    </tr>
                </tfoot>
            </table>
        </div>
      
        <div align="right">
            <input type="button" style="width: 10em;" id="submit" name="submit" value="確定" >
            <input type="button" style="width: 10em;" name="cancel" value="キャンセル" onclick="location.href='http://127.0.0.1:10080/CustomersServices'">
        </div>
    </form>
  </body>
</html>