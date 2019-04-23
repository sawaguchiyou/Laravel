<!DOCTYPE html>
<html language="ja">
<head>
<meta charset="UTF-8">
<title>csv出力</title>
<style type="text/css">
body{background-color:#f4f4f4; text-align:center; font-size:14px; letter-spacing:1px;}
p{margin:0; padding:0;}

.export-wrap{
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

.export-btn{
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

.export-btn:hover{background-color:#0984e3;}
</style>
</head>
<body>
<form class="export-wrap" action="export" method="POST">
  {{ csrf_field() }}
  <input class="export-btn" type="submit" value="一覧取得" formaction = "/export/get"><br><br>
  <input class="export-btn" type="submit" value="csv出力" formaction = "/export/output">
</form>
</body>
</html>
