<html>
  <head>
    <title>事前処理説明変数タイプの編集画面</title>

    <script>
      window.onload = function ()
            {
                var query = location.search;
                var values = query.split('&');

                var preprocess_type_id_value = values[0].split('=');
                var name_value = values[1].split('=');
                var formula_value = values[2].split('=');
                var description_value = values[3].split('=');

                var obj_name = document.getElementById("name");
                var obj_formula = document.getElementById("formula");
                var obj_description = document.getElementById("description");

                obj_name.value = decodeURIComponent(name_value[1]);
                obj_formula.value = decodeURIComponent(formula_value[1]);
                obj_description.value = decodeURIComponent(description_value[1]);
            }
    </script>
  </head>

  <body>
    <h1>事前処理説明変数タイプの編集画面</h1>

    <form method="POST">
      @csrf
      <div>タイプ名： <input id="name" style="width: 20em;" type="text" name="name"></div>
      <div>数式： <input id="formula" style="width: 20em;" type="text" name="formula"></div>
      <div>詳細： <textarea id="description" rows="4" cols="40" name="description"></textarea></div>

      <div align="right">
        <input type="submit" style="width: 10em;" name="edit" value="確定">
        <input type="button" style="width: 10em;" name="cancel" value="キャンセル"  onclick="location.href='http://127.0.0.1:10080/TypesPreprocess'">
      </div>
    </form>
  </body>
</html>