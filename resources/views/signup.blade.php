<!DOCTYPE html>
<html lang="ja">
<head>
<title>新規社員登録</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="{{ asset('css/default.css') }}">
<link rel="stylesheet" href="{{ asset('css/signup.css') }}">
</head>

<body>
    <form class="signup_wrap" action="/staff/ins" method="post">
    {{ csrf_field() }}
        <div class="signup_contain">
            <p class="signup_text">社員ID</p>
            <input class="signup_box" type="text" name="staff_id" maxlength="10">
            <div class = "error">
            {{$errors->first('staff_id')}}
            @if (Session::has('message'))
            <p>{{ session('message') }}</p>
            @endif
            </div>
            <p class="signup_text">社員名</p>
            <input class="signup_box" type="text" name="staff_name" maxlength="40">
            <div class = "error">{{ $errors->first('staff_name') }}</div>

            <p class="signup_text">パスワード</p>
            <input class="signup_box" type="password" name="password" minlength="4">
            <div class = "error">{{ $errors->first('password') }}</div>

            <p class="signup_text"></p>
            <div class="signup_btn">
                <input type="submit" value="新規登録" name="signup_btn" formaction="/staff/ins">
                <input type="submit" value="戻る" name="del_btn" formaction="/">
            </div>
        </div>
    </form>
</body>

</html>
