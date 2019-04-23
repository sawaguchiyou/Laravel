<!DOCTYPE html>
<html lang="ja">
<head>
<title>社員情報削除</title>
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
    padding:5px 10px;
    border:1px solid #ccc;
    box-sizing:border-box;
}

.del-back-btn input{
    padding:5px 15px;
    font-weight:bold;
    color:#fff;
    border:none;
    border-radius:3px;
    background-color:#ff6b6b;
    transition:ease-in-out .2s;
}

.del-back-btn input:hover{
    background-color:#ee5253;
}
</style>
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
