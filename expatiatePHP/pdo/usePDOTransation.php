<?php

/*
 * 文件名： usePDOTransation.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
try{
$dbh = new PDO('mysql:dbname=testdb;host=192.168.8.233', 'fszqit', '1qaz@WSX');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->beginTransaction();
$dbh->exec("insert into staff(id,name,positions) values(1,'Tom','加州')");
$dbh->exec("insert into staff(id,name,positions) values(1,'Tom','加州')");
$dbh->commit();
} catch(Exception $e) {
    $dbh->rollBack();
    echo '失败：'.$e->getMessage();
}
?>

