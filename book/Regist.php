<?php
$name=trim($_POST['username']);
$email=trim($_POST['email']);
$pass=trim($_POST['password']);
$pass1=trim($_POST['new_password']);

if (empty($name) || empty($email) ||empty($pass)){
    echo "<script>alert('你输入的值有空值 请重新填写!');history.back();</script>";exit;
}

if ($pass===$pass1){

    $link=mysqli_connect('localhost','root','root','book');

    $sql="select * from my_user where email='$email'";
    $query=mysqli_query($link,$sql);
    $row=mysqli_fetch_row($query);
    if ($row){
        echo "<script>alert('你注册过的邮箱已经注册过了!');history.back();</script>";exit;
    }else{
        $password=md5($pass);
        $sql1="insert into my_user(name,email,password) value ('$name','$email','$password')";
 
        mysqli_query($link,$sql1);
        $row1=mysqli_affected_rows($link);
        if ($row1 > 0){
            echo "<script>alert('恭喜你注册成功');window.location.href='login.html';</script>";exit;
        }else{
            echo "<script>alert('不好意思注册失败!');history.back();</script>";exit;
        }
    }
}else{
    echo "<script>alert('你两次输入的密码不一样!');history.back();</script>";exit;
}

