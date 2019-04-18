<!DOCTYPE html>
<html lang="ja">
<head>
<title>ログイン</title>
<meta charset="UTF-8">
<style type="text/css">
body{
    background-color:#f4f4f4;
    font-size:14px;
    text-align:center;
    letter-spacing:1px;
}

.rogin-contain{
    max-width:300px;
    margin:50px auto 20px auto;
    padding:30px;
    background-color:#fff;
    border-radius:5px;
    box-shadow:3px 3px 8px rgba(0, 0, 0, 0.2);
}

.rogin-content{
    display:flex;
    flex-wrap:wrap;
    align-items:center;
    justify-content:space-between;
}

.rogin-text{
    width:40%;
    margin:0;
    padding:0;
    color:#666;
    box-sizing:border-box;
}

.rogin-box{
    width:60%;
    margin-bottom:10px;
    box-sizing:border-box;
}

.rogin-btn{
    padding:5px 10px;
    font-weight:bold;
    color:#fff;
    border:none;
    border-radius:3px;
    background-color:#74b9ff;
    transition:ease-in-out .2s;
}

.rogin-btn:hover{
    background-color:#0984e3;
}

.rogin-box{
    padding:5px 10px;
    border:1px solid #ccc;
}

.signup_del_box{display:inline-block;}
.signup_del_box a{padding:0 10px; color:#74b9ff; transition:ease-in-out .2s;}
.signup_del_box a:hover{color:#0984e3;}
</style>
</head>

<body>
<form action="/signin" method="POST" class="rogin-contain">
    {{ csrf_field() }}
    <div class="rogin-content">
        <p class="rogin-text">社員ID</p>
        <input class="rogin-box" type="text" name="user_id">

        <p class="rogin-text">パスワード</p>
        <input class="rogin-box" type="password" name="password">

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