<html>
  <head>
    <title>予測対象タイプの追加画面</title>
  </head>
  <body>
    <h1>予測対象タイプの追加画面</h1>
    @if($message = Session::get('success'))
    <p>{{ $message }}</p>
    @endif

    <form method="POST">
      @csrf
      <div>対象データ名：<input id="name" style="width: 20em;" type="text" name="name"> </div>
      <div>単位：<input id="value_unit" style="width: 20em;" type="text" name="value_unit"></div>      
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
          <input type="submit" style="width: 10em;" name="add" value="確定">
          <input type="button" style="width: 10em;" name="cancel" value="キャンセル"  onclick="location.href='http://127.0.0.1:10080/TypesTargets'">
      </div>
    </form>
  </body>
</html>