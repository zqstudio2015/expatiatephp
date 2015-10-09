<?php

/*
 * 文件名： usePDODataObjectStorage.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
$dbh = new PDO('mysql:dbname=testdb;host=192.168.8.233', 'fszqit', '1qaz@WSX');
$stmt = $dbh->prepare("insert into images(contenttype,imagedata) values(?,?)");
$fp = fopen($_FILES['file']['tmp_name'],'rb');
$stmt->bindParam(1, $_FILES['file']['type']);
//////
////print_r("<pre>");
////var_dump($_FILES['file']['tmp_name']);
////echo "<br>";
////var_dump($_FILES['file']['type']);
////echo "<br>";
////var_dump($_FILES['file']['size']);
////echo "<br>";
////var_dump($fp);
////echo "<br>";
////$data = bin2hex(fread($fp,$_FILES['file']['size']));
////print_r($data);
$stmt->bindParam(2, $fp,PDO::PARAM_LOB);
$stmt->execute();
?>

