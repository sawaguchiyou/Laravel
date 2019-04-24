<!DOCTYPE html>
<html language="ja">
<head>
<meta charset="UTF-8">
<title>商品マスタ</title>
<link rel="stylesheet" href="{{ asset('css/default.css') }}">
<link rel="stylesheet" href="{{ asset('css/search.css') }}">
</head>

<body>
  <form class="kensaku-wrap" action="/main/search" method="POST">
    {{ csrf_field() }}
    <p style="color:#666;">商品コード指定</p>

    <div class="kensaku-contain">
      <p class="kensaku-text">商品コード</p>
      <input class="kensaku-textbox" type="text" name="product_code"
      value = "@isset($product_code) {{$product_code}} @endisset"
      @isset($product_code)
      readonly
      @endisset
      >
      <div class = "error">{{ $errors->first('product_code') }}</div>
      <p class="kensaku-text"></p>
      <button class="kensaku-btn" style="margin:3px;" type="submit" value="search" name="main_btn">検索</button>
    </div>
    <br>

    <div class="kensaku-contain">
      <p class="kensaku-text">商品名</p>
      <input class="kensaku-textbox" type="text" name="product_name"
      value = "@isset($product_name) {{$product_name}} @endisset">
    </div>
    <div class = "error">{{ $errors->first('product_name') }}</div>

    <div class="kensaku-contain">
      <p class="kensaku-text">単価</p>
      <input class="kensaku-textbox" type="text" name="product_value"
      value = "@isset($product_val) {{$product_val}} @endisset">
    </div>
    <div class = "error">{{ $errors->first('product_value') }}</div>

    <div class="kensaku-contain">
      <p class="kensaku-text">前回登録日時</p>
      <div class="kensaku-textbox" style="background-color:#f4f4f4; ">
      @isset($insert_date) {{$insert_date}} @endisset</div><br>
      <p class="kensaku-text">

      </p>
      <div class="kensaku-textbox" style="text-align:right; margin:0;">
        @isset($product_code)
        <input class="kensaku-btn" type="submit" value="削除" formaction = "/main/delete">
        @endisset
        <input class="kensaku-btn" type="submit" value="更新" formaction = "/main/update">

        <input class="kensaku-btn" type="submit" value="戻る" name="koushin-btn" formaction = "/back">
      </div>
    </div>
  </form>
</body>
</html>
