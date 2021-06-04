<html>
  <head>
    <title>事前処理説明変数タイプの追加画面</title>
  </head>
  <body>
    <h1>事前処理説明変数タイプの追加画面</h1>
    @if($message = Session::get('success'))
    <p>{{ $message }}</p>
    @endif

    <form method="POST">
        @csrf
        <div>タイプ名：<input id="name" style="width: 20em;" type="text" name="name"></div>

        <div>数式：<textarea id="formula" row="10" cols="60" name="formula"></textarea></div>
        
        <div>詳細：<textarea id="description" row="10" cols="60" name="description"></textarea></div>

        <div align="right">
            <input type="submit" style="width: 10em;" name="add" value="確定">
            <input type="button" style="width: 10em;" name="cancel" value="キャンセル"  onclick="location.href='http://127.0.0.1:10080/TypesTargets'">
        </div>
    </form>
  </body>
</html>