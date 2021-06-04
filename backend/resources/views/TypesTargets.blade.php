<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>予測対象タイプ</title>
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

            $('#TypesTargetsTable').DataTable( {
                "columnDefs": [
                    {
                        "targets": [ 0 ],
                        "visible": false,
                        "searchable": false
                    }
                ],
            

                // "processing": true,
                // "serverSide": true,
                // "ajax": "TypestargetsModel.php",

                // 'columns':
                // [
                //     {'data':'target_type_id',width:40},
                //     {'data':'name',width:60  },
                //     {'data':'value_unit',width:40  },
                //     {'data':'time_interval',width:40  },,
                // ],


                "scrollY":        "200px",
                "scrollX": true,
                "scrollCollapse": true,
                "paging":         false

            } );

            

            var table = $('#TypesTargetsTable').DataTable();
 
            $('#TypesTargetsTable tbody').on( 'click', 'tr', function () {
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
                var selected_data = table.rows('.selected').data();
                var target_type_id = selected_data[0][0];
                // TypeWeatherController.Delete(target_type_id);
                table.row('.selected').remove().draw( false );
                alert( selected_data[0]+"が削除された。");
            } );


            $('#edit').click( function () {
                var selected_data = table.rows('.selected').data();
                window.location.href = 'http://127.0.0.1:10080/TypesTargets/Edit?target_type_id=' 
                +  encodeURIComponent(selected_data[0][0]) + 
                '&name=' +  encodeURIComponent(selected_data[0][1]) + 
                '&value_unit=' +  encodeURIComponent(selected_data[0][2]) +
                '&time_interval=' +  encodeURIComponent(selected_data[0][3]);
            } );
    
        } );
    </script>
</head>

<body>
    <h1>予測対象タイプの一覧画面</h1>

    <div>
        <div align="left">
            <input type="button" style="width: 20em;" name="add" value="追加" onclick="location.href='http://127.0.0.1:10080/TypesTargets/Add'">
            <input type="button" style="width: 20em;" id="edit"name="edit" value="編集">
        </div>
        
        <div align="right" >
            <button id="DeleteButton" style="width: 20em;" align="right">削除</button>           
        </div>
    </div>
    <br>

    <!-- <div align="right">
        <label for="search_option">検索項目</label>
        <label for="search_keyword">検索キーワード</label>
    </div>
        
    <div align="right">
        <select name="search_option" id="search_option" style="width: 20em;">
            <?php
            // $time_interval = array('全文検索', '対象データ名', '対象単位', '時間間隔');
            
            // print('<option value=0>全文検索</option>');
            // print('<option value=1>対象データ名</option>');
            // print('<option value=2>対象単位</option>');
            // print('<option value=3>時間間隔</option>');
            ?>
            </select>
        <input style="width: 20em;" type="text" name="search_keyword">
        <input type="button" style="width: 20em;" name="search" value="検索">
    </div> -->


    <div class="container">

        <table id="TypesTargetsTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>target_type_id</th>
                    <th>対象データ名</th>
                    <th>単位</th>
                    <th>時間</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>電力需要予測</td>
                    <td>wh</td>
                    <td>30 min</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>電力需要予測</td>
                    <td>wh</td>
                    <td>60 min</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>太陽光発電予測</td>
                    <td>wh</td>
                    <td>30 min</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>target_type_id</th>
                    <th>対象データ名</th>
                    <th>単位</th>
                    <th>時間</th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>