<?php

/*
 * 文件名： excuteTransactionObject.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
$mysqli = new mysqli("192.168.8.233", "fszqit", "1qaz@WSX", "bookstore");
if(mysqli_connect_error()){
    printf("连接失败：%s<br>", mysqli_connect_error());
    exit();
}

$success = TRUE;
$price = 8000;

$mysqli->autocommit(0);
$result = $mysqli->query("update account set cash=cash-$price where name='userA'");
if(!$result or $mysqli->affected_rows !=1){
    $success = FALSE;
}

$result = $mysqli->query("update account set cash=cash-$price where name='userB'");
if(!$result or $mysqli->affected_rows !=1){
    $success = FALSE;
}

if($success){
    $mysqli->commit();
    echo "转账成功";
} else {
    $mysqli->rollback();
    echo "转账失败";
}
$mysqli->autocommit(1);

$mysqli->close();
?>

