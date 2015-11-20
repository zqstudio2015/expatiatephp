<?php

/*
 * 文件名： contral.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
header("Content-Type:text/html;charset=utf-8");
function __autoload($className){
    include $className . "_class.php";
}

isset($_GET["action"]) or die("没有任何活动发生");

$fileaction = new FileAction($_GET["dirname"], $_GET["action"]);
$fileaction->getFileInfo();

if(isset($_GET["dirname"])){
    $fileaction->getForm("filesystem.php?dirname=" . $_GET["dirname"]);
} else {
    $fileaction->getForm("filesystem.php");
}

?>

