<html>
  <head>
    <title>気象類型情報の編集画面</title>
    <script>
      window.onload = function ()
            {
                var query = location.search;
                var values = query.split('&');

                var type_id_value = values[0].split('=');
                var name_value = values[1].split('=');
                var value_unit_value = values[2].split('=');
                var time_interval_value = values[3].split('=');

                var obj_name = document.getElementById("name");
                var obj_value_unit = document.getElementById("value_unit");
                // var obj_time_interval = document.getElementById("time_interval");

                obj_name.value = decodeURIComponent(name_value[1]);
                obj_value_unit.value = decodeURIComponent(value_unit_value[1]);
                // obj_time_interval.value = decodeURIComponent(time_interval_value[1]);
            }
    </script>
  </head>
  <body>
    <h1>気象類型情報の編集画面</h1>
    @if($message = Session::get('success'))
    <p>{{ $message }}</p>
    @endif
    
    <form method="POST">
      @csrf
      <div>気象データ名： <input id="name" style="width: 20em;" type="text" name="name"></div>
      <div>単位： <input id="value_unit" style="width: 20em;" type="text" name="value_unit"></div>
      <div>時間：
      <select name="time_interval" id="time_interval" style="width: 20em;">
      <?php
      $time_interval = array('', '30 min', '60 min', '1 day');
      
      foreach($time_interval as $time_interval){
        print('<option value="' . $time_interval . '">' . $time_interval . '</option>');
      }
      ?>
      </select></div>
      <div align="right">
      <input type="submit" style="width: 10em;" name="edit" value="確定">
      <input type="button" style="width: 10em;" name="cancel" value="キャンセル"  onclick="location.href='http://127.0.0.1:10080/TypeWeather'">
      </div>
    </form>
  </body>
</html>