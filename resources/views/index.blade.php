<!DOCTYPE html>
<html lang="ja">
<head>
<title>ログイン</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="{{ asset('css/default.css') }}">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
<form action="/signin" method="POST" class="rogin-contain">
    {{ csrf_field() }}
    <div class="rogin-content">
        <p class="rogin-text">社員ID</p>
        <input class="rogin-box" type="text" name="user_id">
        {{$errors->first('user_id')}}

        <p class="rogin-text">パスワード</p>
        <input class="rogin-box" type="password" name="password">
        {{$errors->first('password')}}

        <p class="rogin-text"></p>
        <input class="rogin-btn" type="submit" value="ログイン" name="rogin-btn">
    </div>
</form>

<form class="signup_del_box" action="/signup" method="POST" name="signup_name">
{{ csrf_field() }}
<a href="javascript:signup_name.submit()">新規社員登録</a>
</form>

<form class="signup_del_box" action="/staffdel" method="POST" name="staffdel_name">
{{ csrf_field() }}
<a href="javascript:staffdel_name.submit()">社員情報削除</a>
</form>
</body>

</html>
