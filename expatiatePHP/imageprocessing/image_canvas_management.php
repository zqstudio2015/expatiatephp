<?php
/*
 * 文件名： image_canvas_management.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
$img = imagecreatetruecolor(300, 200);
//echo imagesx($img);
//echo imagesy($img);
$white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);
$red = imagecolorallocate($img, 0xFF, 0x00, 0x00);


imagefill($img, 0, 0, $red);
imagestring($img, 5, 5, 5, imagesx($img)."X".imagesy($img), $white);
header('Content-type: image/png');
imagepng($img);
imagedestroy($img);

?>

