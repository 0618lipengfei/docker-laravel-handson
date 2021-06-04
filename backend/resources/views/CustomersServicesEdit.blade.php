<!DOCTYPE html>
<html lang="ja">
  <head>
        <meta charset="UTF-8">
        <title>顧客利用サービスの変更画面</title>  

        <script>
        window.onload = function ()
            {
                var query = location.search;
                var values = query.split('&');

                var id_value = values[0].split('=');
                var service_value = values[1].split('=');
                // var mode_value = values[2].split('=');
                // var active_value = values[3].split('=');
                // var date_start_value = values[4].split('=');
                // var date_end_free_value = values[5].split('=');
                // var date_end_schedule_value = values[6].split('=');
                // var date_end_finalized_value = values[7].split('=');
                // var date_update_last_value = values[8].split('=');
                // var date_update_next_value = values[9].split('=');

                // var obj_date_start = document.getElementById("date_start");
                // var obj_date_end_free = document.getElementById("date_end_free");
                // var obj_date_end_schedule = document.getElementById("date_end_schedule");
                // var obj_date_end_finalized = document.getElementById("date_end_finalized");
                // var obj_date_update_last = document.getElementById("date_update_last");
                // var obj_date_update_next = document.getElementById("date_update_next");

                // obj_date_start.value = decodeURIComponent(date_start_value[1]);
                // obj_date_end_free.value = decodeURIComponent(date_end_free_value[1]);
                // obj_date_end_schedule.value = decodeURIComponent(date_end_schedule_value[1]);
                // obj_date_end_finalized.value = decodeURIComponent(date_end_finalized_value[1]);
                // obj_date_update_last.value = decodeURIComponent(date_update_last_value[1]);
                // obj_date_update_next.value = decodeURIComponent(date_update_next_value[1]);
            }
    </script>

  </head>

  <body>
    <h1>顧客利用サービス</h1>
    <h2>利用中のサービス変更画面</h2>
    @if($message = Session::get('success'))
    <p>{{ $message }}</p>
    @endif

    <form method="POST">
        @csrf
        <div>
            モード：
            <select name="mode" id="mode" style="width: 20em;">
            <?php
            $mode = array('', '通常', '試用');
            foreach($mode as $mode){
                print('<option value="' . $mode . '">' . $mode . '</option>');
            }
            ?>
            </select>
            <label>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</label>
            稼働状況：
            <select name="active" id="active" style="width: 20em;">
            <?php
            $active = array('', '稼働中', '中止');
            foreach($active as $active){
                print('<option value="' . $active . '">' . $active . '</option>');
            }
            ?>
            </select>
        </div>

        <div>
            利用開始日：<input type="date" id="date_start" name="date_start" style="width: 20em;"></input>
            <label>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</label>
            試用終了日：<input type="date" id="date_end_free" name="date_end_free" style="width: 20em;"></input>
        </div>
        <div>
            終了予定日：<input type="date" id="date_end_schedule" name="date_end_schedule" style="width: 20em;"></input>
            <label>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</label>
            利用終了日：<input type="date" id="date_end_finalized" name="date_end_finalized" style="width: 20em;"></input>
        </div>
        <div>
            前回契約更新：<input type="date" id="date_update_last" name="date_update_last" style="width: 20em;"></input>
            <label>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</label>
            次回契約更新：<input type="date" id="date_update_next" name="date_update_next" style="width: 20em;"></input>
        </div>
        
        <div align="right">
            <input type="submit" style="width: 10em;" name="submit" value="確定" onclick="location.href='http://127.0.0.1:10080/CustomersServices'">
            <input type="button" style="width: 10em;" name="cancel" value="キャンセル" onclick="location.href='http://127.0.0.1:10080/CustomersServices'">
        </div>
    </form>
  </body>
</html>