<?php
$id=$_GET['uid'];
$link=mysqli_connect('localhost','root','root','book');

$sql="select * from my_wb where uid=$id order by id desc";
$query=mysqli_query($link,$sql);
$data=[];
while ($row=mysqli_fetch_assoc($query)){

    array_push($data,$row);
}

session_start();
if($_SESSION['user']){
    $sql2="select otherId from my_other where uid={$_SESSION['user']['id']}";
    $query=mysqli_query($link,$sql2);
    $others=[];
    while($other=mysqli_fetch_assoc($query)){
        array_push($others,$other['otherId']);
}


}
/*关注取关结束*/

/*关注列表*/
$sql3="select o.otherId,u.name from my_other as o left join my_user as u on o.otherId=u.id where o.uid=$id";
$query=mysqli_query($link,$sql3);
$gZDate=[];
while ($gz=mysqli_fetch_assoc($query)){
    array_push($gZDate,$gz);
}

// $sql4="select o.otherId,u.name from my_other as o left join my_user as u on o.otherId=u.id where o.uid=$id";
// $query=mysqli_query($link,$sql4);
// $fSDate=[];
// while ($fs=mysqli_fetch_assoc($query)){
//     array_push($fSDate,$fs);
// }

mysqli_close($link);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href='../css/index.css'>
    <link rel="stylesheet" href="../css/gerendt.css">
</head>
<body>

<div class="header">
    <div class="header_center">
        <div class="left">
            <a href="../index.php">网络2032</a>
        </div>
        <?php session_start(); ?>
        <div class="right">
            <ul class="right_ul">
                <?php if ($_SESSION['user']){ ?>
                    <li><a href="../logout.php">退出</a></li>
                    <?php if($_SESSION['user']['id']!=$id){ ?>
                        <?php  if(in_array($id,$others)){ ?>
                    <li><a href="quguan.php?otherId=<?php echo $id ?>">取关</a></li>
                <?php }else{ ?>
                    <li><a href="guanzhu.php?otherId=<?php echo $id ?>">关注</a></li>
                <?php } ?>
            <?php  }  ?> 
                 <!--  <li><a href=""><?php echo $_SESSION['user']['name']?></a></li> -->

                <?php }else{ ?>
                    <li><a href="../login.html">登录</a></li>
                    <li><a href="../zhuce.php">注册</a></li>
                <?php }?>
            </ul>
        </div>
    </div>
    <h1>动态展示</h1>
    <div class="content">
    <!-- 关注列表 -->
    
        <!--发表动态-->
        <?php if ($id==$_SESSION['user']['id']){ ?>
        <div class="content_dt">
            <form action="publish.php" method="post">
                <input type="hidden" name="id" value="<?php echo $_SESSION['user']['id'] ?>">
                <textarea cols="155" rows="10" name="content" ></textarea>
                <button type="submit">发表</button>
            </form>
        </div>
        <?php } ?>
        <ul>
            <?php foreach ($data as $value){ ?>
                <li>
                    <?php echo $value['content']; ?>
                    <?php echo $value['create_time'] ?>
                    <?php if ($_SESSION['user'] && $_SESSION['user']['id']==$id){ ?>
                        <a href="DtDelete.php?wid=<?php echo $value['id'] ?>">删除</a>
                    <?php } ?>
                </li>
            <?php } ?>
        </ul>
   
    </div>

    <div class="gz">
    <ul>
    <h3>关注列表</h3>
    <?php foreach ($gZDate as $val){ ?>
    <li><a href="?uid=<?php echo $val['otherId'] ?>"><?php echo $val['name']?></a></li>
    <?php } ?> 
    </ul>
    </div>

<!--     <div class="fs">
    <ul>
    <h3>粉丝列表</h3>
    <?php foreach ($fSDate as $val){ ?>
    <li><a href="?uid=<?php echo $val['otherId'] ?>"><?php echo $val['name']?></a></li>
    <?php } ?> 
    </ul>
    </div> -->
</div>
</body>
</html>