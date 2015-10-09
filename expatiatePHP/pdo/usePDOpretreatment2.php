<?php

/*
 * 文件名： usePDOpretreatment2.php
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
    exit;
}

$query = "INSERT INTO contactInfo(name,address,phone) VALUES(:name,:address,:phone);";
$stmt = $db->prepare($query);
$stmt->execute(array(":name"=>"孙某某",":address"=>"海淀区",":phone"=>"12345678901"));
$stmt->execute(array(":name"=>"黄某某",":address"=>"宣武区",":phone"=>"12345678902"));
?>

