<?php

/*
 * 文件名： usePDODataObjectStorage2.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
$dbh = new PDO('mysql:dbname=testdb;host=192.168.8.233', 'fszqit', '1qaz@WSX');
//$stmt = $dbh->prepare("select contenttype,imagedata from images where id=?");
//$stmt->execute(array($_GET['id']));
//list($type,$lob) = $stmt->fetch();
//header("content-Type:$type");
//fpassthru($lob); //--------输出非图像字符内容

$stmt = $dbh->prepare("select contenttype,imagedata from images where id=?");
//var_dump(array($_GET["id"]));
$stmt->execute(array($_GET["id"]));

//$row = $stmt->fetch(PDO::FETCH_BOTH);
//header("Content-Type:${row[0]}");
//echo $row[1];

list($type,$lob) = $stmt->fetch(PDO::FETCH_BOTH);
header("Content-Type:$type");
//print_r($lob);
echo $lob;

?>

