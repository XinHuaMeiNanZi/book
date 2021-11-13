<?php
$link=mysqli_connect('localhost','root','root','book');
$sql='select  w.id,w.content,w.create_time,u.name,u.id as uid from my_wb as w left join my_user as u on w.uid=u.id order by w.id desc';
$query=mysqli_query($link,$sql);
$data=[];
while ($row=mysqli_fetch_assoc($query)){

    array_push($data,$row);
}
mysqli_close($link);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>首页</title>
    <link rel="stylesheet" href='css/index.css'>
</head>
<body>
<div class="header">
    <div class="header_center">
        <div class="left">
            <a href="">网络2032</a>
        </div>
        <?php session_start(); ?>
        <div class="right">
            <ul class="right_ul">
                <?php if ($_SESSION['user']){ ?>
                    <li><a href="logout.php">退出</a></li>
                    <li><a href="user/gerendt.php?uid=<?php echo $_SESSION['user']['id'] ?>">动态</a></li>
                    <li><a href=""><?php echo $_SESSION['user']['name'] ?></a></li>

                <?php }else{ ?>
                    <li><a href="login.html">登录</a></li>
                    <li><a href="zhuce.php">注册</a></li>
                <?php }?>
            </ul>
        </div>
    </div>
    <h1>动态展示</h1>
    <div class="content">
        <ul>
            <?php foreach ($data as $value){ ?>
                <li>
                    <?php echo $value['content']; ?>
                    <?php echo $value['create_time'] ?>
                    <a href="user/gerendt.php?uid=<?php echo $value['uid']?>"><?php echo $value['name'] ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
</body>
</html>