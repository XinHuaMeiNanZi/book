<?php
session_start();
$otherId=$_GET['otherId'];
if($_SESSION['user'] && empty($otherId)){
   "<script>alert('请登录');window.location.href='../index.php';</script>";exit;
}
$uid=$_SESSION['user']['id'];
$link=mysqli_connect('localhost','root','root','book');
$sql="insert into my_other(uid,otherId) value($uid,$otherId)";
$query=mysqli_query($link,$sql);
$row=mysqli_affected_rows($link);
if($row){
	echo "<script>alert('关注成功');history.back();</script>";exit;
}else{
	echo "<script>alert('关注失败');history.back();</script>";exit;
}