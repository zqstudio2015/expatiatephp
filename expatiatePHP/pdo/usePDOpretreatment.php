<?php

/*
 * 文件名： usePDOpretreatment.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
try{
    $db = new PDO('mysql:host=192.168.8.233;dbname=testdb', 'fszqit', '1qaz@WSX');
//    echo '数据库连接成功！';
} catch (Exception $ex) {
    echo '数据库连接失败：' .$ex->getMessage();
}

$query = "INSERT INTO contactInfo(name,address,phone) VALUES(?,?,?);";
//$query = "INSERT INTO contactInfo(name,address,phone) VALUES(:name,:address,:phone);";
$stmt = $db->prepare($query);

$name = "赵钱孙";
$address = "云浮市新兴县";
$phone = "15024241352";
$stmt->bindParam(1, $name);
$stmt->bindParam(2, $address);
$stmt->bindParam(3, $phone);
//$stmt->bindParam(':name', $name);
//$stmt->bindParam(':address', $address);
//$stmt->bindParam(':phone', $phone);
$stmt->execute();

$name = "陈李张";
$address = "云浮市新兴县";
$phone = "1580168698";
$stmt->execute();

?>

