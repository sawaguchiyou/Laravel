<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>商品検索マスタ</title>
<link rel="stylesheet" href="{{ asset('css/default.css') }}">
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
<form action = "/main" method = "POST">
    {{ csrf_field() }}
<div class="syouhin-wrap">
    <button type="submit" name="name" value="main" class="syouhin-btn">検索・更新・削除</button>
    <button type="submit" name="name" value="ins" class="syouhin-btn">新規登録</button>
    <button type="submit" name="name" value="exp" class="syouhin-btn">csv入出力</button>
    <button type="submit" name="name" value="exit" class="syuuryou-btn">終了</button>
</div>
</form>
</body>
</html>
