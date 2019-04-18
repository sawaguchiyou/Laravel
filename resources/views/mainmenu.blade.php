<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>商品検索マスタ</title>
<style type="text/css">
body{background-color:#f4f4f4; font-size:14px; letter-spacing:1px;}

.syouhin-wrap{
    max-width:300px;
    margin:50px auto;
    padding:30px;
    border-radius:5px;
    background-color:#fff;
    box-shadow:3px 3px 8px rgba(0,0,0,0.3);
}

.syouhin-btn{
    width:100%;
    margin-bottom:10px;
    padding:8px 10px;
    background-color:#f4f4f4;
}

.syouhin-btn,.syuuryou-btn{
    display:block;
    color:#666;
    text-align:center;
    text-decoration:none;
    box-sizing:border-box;
    border:1px solid #ccc;
    transition:ease-in-out .2s;
}

.syouhin-btn:hover{
    color:#fff;
    background-color:#ccc;
}

.syuuryou-btn{
    width:30%;
    margin:0 0 0 auto;
    padding:5px 10px;
    color:#fff;
    font-size:14px;
    font-weight:bold;
    border:none;
    border-radius:3px;
    background-color:#ff6b6b;
}

.syuuryou-btn:hover{
    color:#fff;
    background-color:#ee5253;
}

</style>
</head>
<body>
<form action = "/main" method = "POST">
    {{ csrf_field() }}
<div class="syouhin-wrap">
    <button type="submit" name="name" value="main" class="syouhin-btn">検索・更新・削除</button>
    <button type="submit" name="name" value="ins" class="syouhin-btn">新規登録</button>
    <button type="submit" name="name" value="exit" class="syuuryou-btn">終了</button>
</div>
</form>
</body>
</html>