<?php
$fromurl="../error/error.html";

if( $_SERVER['HTTP_REFERER'] == "" ){
    header("Location:".$fromurl);
    exit;
}
$wid=$_GET['wid'];
session_start();

if ($wid && $_SESSION['user']){
    $link=mysqli_connect('localhost','root','root','book');
    $sql="delete from my_wb where id=$wid";
    $query=mysqli_query($link,$sql);
    $row=mysqli_affected_rows($link);
    if ($row>0){
        echo "<script>alert('删除成功');history.back();</script>";exit;
    }else{
        echo "<script>alert('删除失败，请刷新后在试');history.back();</script>";exit;
    }
}else{
    echo "<script>window.location.href='../index.php';</script>";exit;
}