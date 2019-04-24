<!DOCTYPE html>
<html language="ja">
<head>
<meta charset="UTF-8">
<title>新規登録</title>
<link rel="stylesheet" href="{{ asset('css/default.css') }}">
<link rel="stylesheet" href="{{ asset('css/insert.css') }}">
</head>
<body>
<form class="touroku-wrap" action="/insert" method="POST">
{{ csrf_field() }}
  <div class="touroku-contain">
    <p class="touroku-text">商品コード</p>
    <input class="touroku-textbox" type="number" name="product_code">
  </div>
<div class = "error">{{ $errors->first('product_code') }}</div>
  <div class="touroku-contain">
    <p class="touroku-text">商品名</p>
    <input class="touroku-textbox" type="text" name="product_name">
  </div>
  <div class = "error">{{ $errors->first('product_name') }}</div>

  <div class="touroku-contain">
    <p class="touroku-text">単価</p>
    <input class="touroku-textbox" type="number" name="product_value">
  </div>
  <div class = "error">{{ $errors->first('product_value') }}</div>

  <div class="touroku-contain">
    <p class="touroku-text"></p>
    <div class="touroku-textbox" style="text-align:right;">
    <input class="sinki-btn" type="submit" value="新規登録" name="sinki-btn">
    <input class="back-btn" type="submit" value="戻る" name="back-btn" formaction = "/back">
    </div>
  </div>

</form>
</body>
</html>
