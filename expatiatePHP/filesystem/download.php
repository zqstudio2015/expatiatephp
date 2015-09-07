<?php

/*
 * 文件名： download.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

function __autoload($className){
    include $className . "_class.php";
}
isset($_GET["filename"]) or die("下载的文件名不存在");
!empty($_GET["filename"]) or die("文件名为空");

$file = new Filec($_GET["filename"]);
$file->download();
?>

