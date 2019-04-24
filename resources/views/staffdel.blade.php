<!DOCTYPE html>
<html lang="ja">
<head>
<title>社員情報削除</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="{{ asset('css/default.css') }}">
<link rel="stylesheet" href="{{ asset('css/staffdel.css') }}">
</head>

<body>
<form action="/staff/del" method="POST" class="rogin-contain">
{{ csrf_field() }}
    {{ csrf_field() }}
    <div class="rogin-content">
        <p class="rogin-text">社員ID</p>
        <input class="rogin-box" type="text" name="staff_id">

        <p class="rogin-text">パスワード</p>
        <input class="rogin-box" type="password" name="password">

        <p class="rogin-text"></p>
        <div class="del-back-btn">
            <input type="submit" value="削除" name="del-btn">
            <input type="submit" value="戻る" name="back-btn" formaction = "/">
        </div>
    </div>
</form>
</html>
