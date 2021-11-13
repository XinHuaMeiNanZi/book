<?php

$img=imagecreate(130,35);

$bcolor=imagecolorallocate($img,255,255,255);
$content='0123456789asdfghjklzxcvbnmqwertyuiop';
$num=strlen($content);
$font='D:\PHP\phpstudy_pro\WWW\book\font\wjl.ttf';
$code='';
for ($i=0;$i<4;$i++){
    $ang=mt_rand(-30,30);
    $font_color=imagecolorallocate($img,mt_rand(200,400),mt_rand(200,400),mt_rand(200,400));
    $font_size=15;
    $font_content=$content[mt_rand(0,$num-1)];
    $code.=$font_content;
    imagettftext($img,$font_size,$ang,20+($i*30),25,$font_color,$font,$font_content);
}
session_start();
$_SESSION['code']=$code;
header('Content-type:image/jpeg');
imagejpeg($img);
