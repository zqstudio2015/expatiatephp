<?php

/*
 * 文件名： mysqliConnected.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
header("Content-Type:text/html;charset=utf-8");
//$mysqli = new mysqli();
//$mysqli->connect("192.168.8.233", "fszqit", "1qaz@WSX");
//$mysqli->select_db("bookstore");

/*如果没有连接则使用 mysqli_init() 函数创建一个连接对象
 * 
 */
$mysqli = mysqli_init();
$mysqli->options(MYSQLI_INIT_COMMAND, "SET AUTOCOMMIT=0");
$mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5);
$mysqli->real_connect("192.168.8.233", "fszqit", "1qaz@WSX", "bookstore");

if(mysqli_connect_errno()){
    printf("连接失败：％s\n", mysqli_connect_error());
    exit();
}

printf("当前数据库的字符集：%s<br>", $mysqli->character_set_name());
printf("客户端版本：%s<br>", $mysqli->get_client_info());
printf("服务器主机信息：%s<br>", $mysqli->host_info);
printf("服务器版本：%s<br>", $mysqli->server_info);
printf("服务器版本：%s<br>", $mysqli->server_version);
$mysqli->close();
?>

