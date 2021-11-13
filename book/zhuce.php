<?php
session_start();
if ($_SESSION['user']){
    echo "<script>alert('你已经登录不需要再注册了');window.location.href='index.php';</script>";exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
    form{
    width: 400px;
    height: auto;
    padding: 10px 20px;;
    margin: 50px auto;
    border: 1px solid #CCCCCC;
    border-radius: 5px;;
    }
    form label{
        display: block;
        width: 100%;
        height: 40px;;
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
    }
    form label span{
        width: 70px;;
        height: 100%;;
        text-align: center;
        line-height: 40px;;
    }
    form label input{
        width: 300px;;
        height: 40px;;
        border:0;
        border-bottom: 1px solid #ccc;;
    }
    button{
        width: 100%;
        height: 40px;
        text-align: center;
        line-height: 40px;;
        background-color: #0097df;
        color:#fff;
        font-size: 18px;;
        margin-bottom: 20px;;
        border: 0;
        cursor: pointer;
    }
    </style>
</head>
<body>
    <div align="center">
    <form action="Regist.php" method="post">
    <h1>注册页面</h1>
            <label for="">
                <span>用户名</span>
                <input type="text" name="username" />
            </label>
            <label for="">
                <span>邮箱</span>
                <input type="email" name="email" />
            </label>
            <label for="">
                <span>密码</span>
                <input type="password" name="password" />
            </label>
            <label for="">
                <span>确认密码</span>
                <input type="password" name="new_password" />
            </label>
            <button type="submit">确认注册</button>
    </form>
    </div>
</body>
</html>