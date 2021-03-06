<?php

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<title>新規社員登録</title>
<meta charset="UTF-8">
<style type="text/css">
body{
    background-color:#f4f4f4;
    font-size:14px;
    text-align:center;
    letter-spacing:1px;
}
p{margin:0; padding:0;}

.signup_wrap{
    max-width:300px;
    margin:50px auto;
    padding:30px;
    background-color:#fff;
    border-radius:5px;
    box-shadow:3px 3px 8px rgba(0, 0, 0, 0.2);
}

.signup_contain{
    display:flex;
    flex-wrap:wrap;
    align-items:center;
    justify-content:space-between;
}

.signup_text{
    display:block;
    width:40%;
    margin:0;
    padding:0;
    color:#666;
    box-sizing:border-box;
}

.signup_box{
    width:60%;
    margin-bottom:10px;
    box-sizing:border-box;
    padding:5px 10px;
    border:1px solid #ccc;
}

.signup_btn input{
    padding:5px 15px;
    font-weight:bold;
    color:#fff;
    border:none;
    border-radius:3px;
    background-color:#74b9ff;
    transition:ease-in-out .2s;
}

.signup_btn input:hover{
    background-color:#0984e3;
}
</style>
</head>

<body>
    <form class="signup_wrap" action="/staff/ins" method="post">
    {{ csrf_field() }}
        <div class="signup_contain">
            <p class="signup_text">社員ID</p>
            <input class="signup_box" type="text" name="staff_id">

            <p class="signup_text">社員名</p>
            <input class="signup_box" type="text" name="staff_name">

            <p class="signup_text">パスワード</p>
            <input class="signup_box" type="password" name="password">

            <p class="signup_text"></p>
            <div class="signup_btn">
                <input type="submit" value="新規登録" name="signup_btn" formaction="/staff/ins">
                <input type="submit" value="戻る" name="del_btn" formaction="/back/top">
            </div>
        </div>
    </form>
</body>

</html>