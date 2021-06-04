<?php

//phpinfo(); 
// $connect = mysqli_connect("localhost","root","secret","shimizuGUI");
// $query = "SELECT * FROM types_weather ORDER BY type_id DESC";
// $result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>気象類型情報</title>
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

            $('#TypesWeatherTable').DataTable( {
                "columnDefs": [
                    {
                        "targets": [ 0 ],
                        "visible": false,
                        "searchable": false
                    }
                ],
            
                // "processing": true,
                // "serverSide": true,
                // "ajax": {
                //     url: 'TypeWeather/ajax', // データ取得するURL
                //     dataFilter(data) {      // 取得したデータを加工する

                //         let json = JSON.parse(data);
                //         json.recordsTotal = json.total;
                //         json.recordsFiltered = json.total;
                //         return JSON.stringify(json);

                //     }
                // },
                // columns: [
                //     {
                //         data: 'type_id',
                //         title: 'type_id'
                //     },
                //     {
                //         data: 'name',
                //         title: '気象データ名'
                //     },
                //     {
                //         data: 'value_unit',
                //         title: '単位'
                //     },
                //     {
                //         data: 'time_interval',
                //         title: '時間'
                //     }
                // ],
                // order: [[ 0, 'asc' ]],  

                "scrollY":        "200px",
                "scrollX": true,
                "scrollCollapse": true,
                "paging":         false

            } );

            

            var table = $('#TypesWeatherTable').DataTable();
 
            $('#TypesWeatherTable tbody').on( 'click', 'tr', function () {
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
    
            $('#edit').click( function () {
                var selected_data = table.rows('.selected').data();
                window.location.href = 'http://127.0.0.1:10080/TypeWeather/Edit?type_id=' 
                +  encodeURIComponent(selected_data[0][0]) + 
                '&name=' +  encodeURIComponent(selected_data[0][1]) + 
                '&value_unit=' +  encodeURIComponent(selected_data[0][2]) +
                '&time_interval=' +  encodeURIComponent(selected_data[0][3]);
            } );


        } );
    </script>
</head>

<body>
    <h1>気象類型情報の一覧画面</h1>


    <div>
        <div align="left">
            <input type="button" style="width: 20em;" name="add" value="追加" onclick="location.href='http://127.0.0.1:10080/TypeWeather/Add'">
            <input type="button" style="width: 20em;" id="edit" name="edit" value="編集">
        </div>
        
        <div align="right" >
            <button id="DeleteButton" style="width: 20em;" >削除</button>
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
        <table id="TypesWeatherTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>type_id</th>
                    <th>気象データ名</th>
                    <th>単位</th>
                    <th>時間</th>
                </tr>
            </thead>
            <?php
            // while($row = mysqli_fetch_array($result))
            // {
            //     echo '
            //     <tr>
            //         <td>'.$row["type_id"].'</td>
            //         <td>'.$row["name"].'</td>
            //         <td>'.$row["value_unit"].'</td>
            //         <td>'.$row["time_interval"].'</td>
            //     </tr>
            //     ';
            // }
            ?>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>温度</td>
                    <td>℃</td>
                    <td>30 min</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>温度</td>
                    <td>℃</td>
                    <td>60 min</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>湿度</td>
                    <td>%</td>
                    <td>30 min</td>
                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <th>type_id</th>
                    <th>気象データ名</th>
                    <th>単位</th>
                    <th>時間</th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>