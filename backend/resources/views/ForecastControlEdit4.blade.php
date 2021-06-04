<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>予測コントロールの変更画面（4/4）</title>  
    <script>
        window.onload = function ()
          {
              var query = location.search;
              var values = query.split('&');
              // alert(values[0]+" / "+values[1]);
              var target_group_value = values[0].split('=');
              var model_value = values[1].split('=');
              var model_entity_value = values[2].split('=');
              var daily_forecasting_time_value = values[3].split('=');
              var training_interval_days = values[4].split('=');
              var training_data_days_value = values[5].split('=');
              // alert(target_group_value+" / "+model_value);

              var obj_target_group = document.getElementById("target_group");
              var obj_model = document.getElementById("model");
              var obj_model_entity = document.getElementById("model_entity");
              // var obj_daily_forecasting_time = document.getElementById("daily_forecasting_time");
              var obj_training_interval_days = document.getElementById("training_interval_days");
              var obj_training_data_days = document.getElementById("training_data_days");
              // obj.placeholder = "test";
              obj_target_group.value = decodeURIComponent(target_group_value[1]);
              obj_model.value = decodeURIComponent(model_value[1]);
              obj_model_entity.value = decodeURIComponent(model_entity_value[1]);
              // obj_daily_forecasting_time.value = decodeURIComponent(daily_forecasting_time_value[1]);
              obj_training_interval_days.value = decodeURIComponent(training_interval_days[1]);
              obj_training_data_days.value = decodeURIComponent(training_data_days_value[1]);
          }

    </script>
  </head>

  <body>
    <h1>予測コントロール</h1>
    <h2>サービスの予測対象　変更画面（4/4）</h2>
    @if($message = Session::get('success'))
    <p>{{ $message }}</p>
    @endif

    <form method="POST">
      @csrf
      <div>対象グループ：<input id="target_group" style="width: 20em;" type="text" name="target_group" disabled="disabled" placeholder="清水建設_技術研究所_全体電力"> </div>
      <div>モデル：<input id="model" style="width: 20em;" type="text" name="model" disabled="disabled" placeholder="ShimizElec1ResNet0001"></div>      
      <div>モデルエンティティ：<input id="model_entity" style="width: 20em;" type="text" name="model_entity" disabled="disabled" placeholder="1"></div>
      
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
      <div><b>再訓練実行時間間隔：</b><input id="training_interval_days" style="width: 20em;" type="text" name="training_interval_days" placeholder="7"></div>      
      <div><b>再訓練用訓練データ量：</b><input id="training_data_days" style="width: 20em;" type="text" name="training_data_days" placeholder="30"></div>
      
      <div align="right">
          <input type="submit" style="width: 10em;" name="next" value="確定">
          <!-- <input type="button" style="width: 10em;" name="back" value="戻る" onclick="location.href='http://127.0.0.1:10080/ForecastControl/Edit3'"> -->
          <input type="button" style="width: 10em;" name="cancel" value="キャンセル" onclick="location.href='http://127.0.0.1:10080/ForecastControl'">
      </div>
    </form>
  </body>
</html>