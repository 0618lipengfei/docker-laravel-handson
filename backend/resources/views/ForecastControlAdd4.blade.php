<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>予測コントロールの追加画面（4/4）</title>  
    <script>
        // $(document).ready(function() {
          // $('#back').click( function () {
          //     var query = location.search;
          //     var values = query.split('&');
          //     // alert(values[0]+" / "+values[1]);
          //     var target_group_value = values[0].split('=');
          //     var model_value = values[1].split('=');
          //     var model_entity_value = values[2].split('=');

          //     window.location.href = 'http://127.0.0.1:10080/ForecastControl/Add3?target_group=' 
          //     +  encodeURIComponent(target_group_value[1]) +
          //     'model=' + encodeURIComponent(model_value[1]);
          // } );

        // } );

      window.onload = function ()
          {
              var query = location.search;
              var values = query.split('&');
              // alert(values[0]+" / "+values[1]);
              var target_group_value = values[0].split('=');
              var model_value = values[1].split('=');
              var model_entity_value = values[2].split('=');
              // alert(target_group_value+" / "+model_value);

              var obj_target_group = document.getElementById("target_group");
              var obj_model = document.getElementById("model");
              var obj_model_entity = document.getElementById("model_entity");
              // obj.placeholder = "test";
              obj_target_group.value = decodeURIComponent(target_group_value[1]);
              obj_model.value = decodeURIComponent(model_value[1]);
              obj_model_entity.value = decodeURIComponent(model_entity_value[1]);
          }
    </script>
  </head>
  
  <body>
    <h1>予測コントロール</h1>
    <h2>サービスの予測対象　追加画面（4/4）</h2>
    @if($message = Session::get('success'))
    <p>{{ $message }}</p>
    @endif

    <form method="POST">
      @csrf
      <div>対象グループ：<input id="target_group" style="width: 20em;" type="text" name="target_group" disabled="disabled"> </div>
      <div>モデル：<input id="model" style="width: 20em;" type="text" name="model" disabled="disabled"></div>      
      <div>モデルエンティティ：<input id="model_entity" style="width: 20em;" type="text" name="model_entity" disabled="disabled"></div>
      
      <div align="middle">----------------------------------------------------</div>

      <div><b>日ごと予測実行時刻：</b>
      <select name="daily_forecasting_time" id="daily_forecasting_time" style="width: 20em;">
      <?php
      $daily_forecasting_time = array('00:00', '00:30', '01:00', '01:30', '02:00', '02:30', '03:00', '03:30', 
                                    '04:00', '04:30', '05:00', '05:30', '06:00', '06:30', '07:00', '07:30',
                                    '08:00', '08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', 
                                    '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', 
                                    '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30', 
                                    '20:00', '20:30', '21:00', '21:30', '22:00', '22:30', '23:00', '23:30');
      
      foreach($daily_forecasting_time as $daily_forecasting_time){
        print('<option value="' . $daily_forecasting_time . '">' . $daily_forecasting_time . '</option>');
      }
      ?>
      </select></div>
      <div><b>再訓練実行時間間隔：</b><input id="training_interval_days" style="width: 20em;" type="text" name="training_interval_days" ></div>      
      <div><b>再訓練用訓練データ量：</b><input id="training_data_days" style="width: 20em;" type="text" name="training_data_days">　</div>
      
      <div align="right">
          <input type="submit" style="width: 10em;" name="next" value="確定" onclick="location.href='http://127.0.0.1:10080/ForecastControl'">
          <!-- <input id="back" type="button" style="width: 10em;" name="back" value="戻る"> -->
          <input type="button" style="width: 10em;" name="cancel" value="キャンセル" onclick="location.href='http://127.0.0.1:10080/ForecastControl'">
      </div>
    </form>
  </body>
</html>