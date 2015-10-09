<?php

/*
 * 文件名： usePDOExec.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

try{
    $db = new PDO('mysql:host=192.168.8.233;dbname=testdb', 'fszqit', '1qaz@WSX');
    echo '数据库连接成功！';
} catch (Exception $ex) {
    echo '数据库连接失败：' .$ex->getMessage();
    exit;
}
$query = "update contactInfo set departmentId='D02' where name='陈某某'";
$affected = $db->exec($query);
if($affected){
    echo '数据表 contactInfo 中受影响的行数为：' .$affected;
} else {
    print_r($db->errorInfo());
}
?>

