

<!DOCTYPE html>
<html language="ja">
<head>
<meta charset="UTF-8">
<title>新規登録</title>
<style type="text/css">
body{background-color:#f4f4f4; text-align:center; font-size:14px; letter-spacing:1px;}
p{margin:0; padding:0;}

.touroku-wrap{
  display:block;
  max-width:300px;
  margin:50px auto;
  padding:30px;
  background-color:#fff;
  border-radius:5px;
  box-shadow:3px 3px 8px rgba(0, 0, 0, 0.2);
}

.touroku-contain{
  display:flex;
  flex-wrap:wrap;
  align-items: center;
  justify-content:space-between;
}

.touroku-text{
  width:40%;
  color:#666;
  box-sizing:border-box;
}

.touroku-textbox{
  width:60%;
  margin:5px 0;
  padding:5px;
  box-sizing:border-box;
}

.sinki-btn,.back-btn{
  padding:5px 10px;
  font-weight:bold;
  border:none;
  border-radius:3px;
  background-color:#fff;
  transition:ease-in-out .2s;
}

.sinki-btn{color:#fff; background-color:#74b9ff;}
.back-btn{color:#666; background-color:#f4f4f4;}
.sinki-btn:hover{background-color:#0984e3;}
.back-btn:hover{background-color:#e0e0e0;}
</style>
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
