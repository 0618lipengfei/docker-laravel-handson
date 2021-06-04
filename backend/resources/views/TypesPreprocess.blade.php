<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>事前処理説明変数タイプ</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/jszip-2.5.0/dt-1.10.24/af-2.3.6/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/cr-1.5.3/date-1.0.3/fc-3.3.2/fh-3.1.8/kt-2.6.1/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.3/datatables.min.css"/>
 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/jszip-2.5.0/dt-1.10.24/af-2.3.6/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/cr-1.5.3/date-1.0.3/fc-3.3.2/fh-3.1.8/kt-2.6.1/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.3/datatables.min.js"></script>

    <script>
        function format ( d ) {
            return d.description+'<br>'+
                'test test test';
        }


        $(document).ready(function() {


            // デフォルトの設定を変更
            $.extend( $.fn.dataTable.defaults, { 
                language: {
                    url: "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Japanese.json"
                } 
            });

            $('#TypesPreprocessTable').DataTable( {
                "columnDefs": [
                    {
                        "targets": [ 0 ],
                        "visible": false,
                        "searchable": false
                    }
                ],
            

                // "processing": true,
                // "serverSide": true,
                // "ajax": "TypesPreprocessModel.php",

                // "columns":
                // [
                //     {'data':'preprocess_type_id'},
                //     {'data':'name'},
                //     {'data':'formula'},
                //     {
                //         "class":          'description',
                //         "orderable":      false,
                //         "data":           null,
                //         "defaultContent": ''
                //     }
                // ],


                "scrollY":        "200px",
                "scrollX": true,
                "scrollCollapse": true,
                "paging":         false

            } );

            var table = $('#TypesPreprocessTable').DataTable();
 
            $('#TypesPreprocessTable tbody').on( 'click', 'tr', function () {
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


            // Array to track the ids of the details displayed rows
            // var detailRows = [];
            $('#TypesPreprocessTable tbody').on( 'click', 'tr td.description', function () {
                var tr = $(this).closest('tr');
                var row = dt.row( tr );
                // var idx = $.inArray( tr.attr('preprocess_type_id'), detailRows );
        
                if ( row.child.isShown() ) {
                    tr.removeClass( 'description' );
                    row.child.hide();
        
                    // Remove from the 'open' array
                    detailRows.splice( idx, 1 );
                }
                else {
                    tr.addClass( 'description' );
                    row.child( format( row.data() ) ).show();
        
                    // Add to the 'open' array
                    // if ( idx === -1 ) {
                    //     detailRows.push( tr.attr('preprocess_type_id') );
                    // }
                }
            } );
        
            // // On each draw, loop over the `detailRows` array and show any child rows
            // dt.on( 'draw', function () {
            //     $.each( detailRows, function ( i, preprocess_type_id ) {
            //         $('#'+preprocess_type_id+' td.description').trigger( 'click' );
            //     } );
            // } );
            $('#edit').click( function () {
                var selected_data = table.rows('.selected').data();
                window.location.href = 'http://127.0.0.1:10080/TypesPreprocess/Edit?preprocess_type_id=' 
                +  encodeURIComponent(selected_data[0][0]) + 
                '&name=' +  encodeURIComponent(selected_data[0][1]) + 
                '&formula=' +  encodeURIComponent(selected_data[0][2]) +
                '&description=' +  encodeURIComponent(selected_data[0][3]);
            } );
        } );
    </script>
</head>

<body>
    <h1>事前処理説明変数タイプの一覧画面</h1>


    <div>
        <div align="left">
            <input type="button" style="width: 20em;" name="add" value="追加" onclick="location.href='http://127.0.0.1:10080/TypesPreprocess/Add'">
            <input type="button" style="width: 20em;" id="edit" name="edit" value="編集">
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
            // $time_interval = array('全文検索', 'タイプ名', '数式', '詳細');
            
            // print('<option value=0>全文検索</option>');
            // print('<option value=1>タイプ名</option>');
            // print('<option value=2>数式</option>');
            // print('<option value=3>詳細</option>');
            ?>
            </select>
        <input style="width: 20em;" type="text" name="search_keyword">
        <input type="button" style="width: 20em;" name="search" value="検索">
    </div> -->


    <div class="container">

        <table id="TypesPreprocessTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>preprocess_type_id</th>
                    <th>タイプ名</th>
                    <th>数式</th>
                    <th>詳細</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>数式1</td>
                    <td>a=b+c</td>
                    <td>詳細123456789</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>数式2</td>
                    <td>b=a+c</td>
                    <td>詳細123456789</td>
                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <th>preprocess_type_id</th>
                    <th>タイプ名</th>
                    <th>数式</th>
                    <th>詳細</th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>