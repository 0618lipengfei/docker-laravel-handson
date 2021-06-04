<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>モデルとモデルエンティティの詳細画面</title>  
    <script>
        window.onload = function ()
          {
              var query = location.search;
              var values = query.split('&');
              // alert(values[0]+" / "+values[1]);
              var target_group_value = values[0].split('=');
              var model_value = values[1].split('=');
              var model_entity_value = values[2].split('=');
            //   var daily_forecasting_time_value = values[3].split('=');
            //   var training_interval_days = values[4].split('=');
            //   var training_data_days_value = values[5].split('=');
              // alert(target_group_value+" / "+model_value);

            //   var obj_target_group = document.getElementById("target_group");
              var obj_model = document.getElementById("model");
              var obj_model_entity = document.getElementById("model_entity");
            //   var obj_daily_forecasting_time = document.getElementById("daily_forecasting_time");
            //   var obj_training_interval_days = document.getElementById("training_interval_days");
            //   var obj_training_data_days = document.getElementById("training_data_days");
              // obj.placeholder = "test";
            //   obj_target_group.value = decodeURIComponent(target_group_value[1]);
              obj_model.innerHTML = decodeURIComponent(model_value[1]);
              obj_model_entity.innerHTML = decodeURIComponent(model_entity_value[1]);
            //   obj_daily_forecasting_time.value = decodeURIComponent(daily_forecasting_time_value[1]);
            //   obj_training_interval_days.value = decodeURIComponent(training_interval_days[1]);
            //   obj_training_data_days.value = decodeURIComponent(training_data_days_value[1]);

            var input_sequential_value = 1;
            var input_sequential_mark;
            if(input_sequential_value==1){
                input_sequential_mark = "●";
            }else{
                input_sequential_mark = "×";
            }
            document.getElementById("input_sequential").innerHTML = input_sequential_mark;

            var input_weekly_value = 0;
            var input_weekly_mark;
            if(input_weekly_value==1){
                input_weekly_mark = "●";
            }else{
                input_weekly_mark = "×";
            }
            document.getElementById("input_weekly").innerHTML = input_weekly_mark;
          }

    </script>
  </head>
  
  <body>
    <h1>詳細画面</h1>
      <h2>モデル詳細</h2>
      <div>モデル：<label id="model"></label></div>  
      <div>パス：<label id="model_path"></label></div> 
      <div>入力タイプ（時間順）：<label id="input_sequential"></label></div> 
      <div>入力タイプ（曜日順）：<label id="input_weekly"></label></div> 
      <div>入力データ期間：<label id="input_days"></label></div>     
      
      <h2>モデルエンティティ詳細</h2>
      <div>モデルエンティティ：<label id="model_entity"></label></div>
      <div>モデル：<label id="model"></label></div>  
      <div>パス：<label id="model_entity_path"></label></div> 

      <div>ハイパーパラメータ</div>
      <div>&emsp; &emsp; 最大エポック：<label id="hp_MAX_EPOCHS"></label></div> 
      <div>&emsp; &emsp; 学習率：<label id="hp_LEARNING_RATE"></label></div> 
      <div>&emsp; &emsp; 早期打ち切りpatience値：<label id="hp_EARLY_STOPPING_PATIENCE"></label></div> 
      <div>&emsp; &emsp; 最適化アルゴリズム：<label id="hp_OPTIMIZER"></label></div> 
      <div>&emsp; &emsp; 損失関数：<label id="hp_LOSS"></label></div> 
      <div>&emsp; &emsp; 評価関数：<label id="hp_METRICS"></label></div> 

      <div>前回訓練時刻：<label id="model_entity_path"></label></div> 
  </body>
</html>