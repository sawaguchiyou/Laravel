<!DOCTYPE html>
<html language="ja">
<head>
<meta charset="UTF-8">
<title>商品マスタ</title>
<style type="text/css">
body{background-color:#f4f4f4; text-align:center; font-size:14px; letter-spacing:1px;}
p{margin:0; padding:0;}

.kensaku-wrap{
  display:block;
  max-width:300px;
  margin:50px auto;
  padding:30px;
  background-color:#fff;
  border-radius:5px;
  box-shadow:3px 3px 8px rgba(0, 0, 0, 0.2);
}

.kensaku-contain{
  display:flex;
  flex-wrap:wrap;
  align-items: center;
  justify-content:space-between;
}

.kensaku-text{
  width:40%;
  color:#666;
  box-sizing:border-box;
}

.kensaku-textbox{
  width:60%;
  margin:5px 0;
  padding:5px;
  box-sizing:border-box;
}

.kensaku-btn{
  width:31%;
  margin:0;
  padding:5px 10px;
  font-weight:bold;
  border:none;
  border-radius:3px;
  color:#fff;
  background-color:#74b9ff;
  box-sizing:border-box;
  transition:ease-in-out .2s;
}

.kensaku-btn:hover{background-color:#0984e3;}

.error {
  color:#f00;
  width:100%;
}

</style>
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
