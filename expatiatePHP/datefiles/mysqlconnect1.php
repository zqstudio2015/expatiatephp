<?php

/*
 * 文件名： mysqlconnect1.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
header("Content-Type:text/html;charset=utf-8");
$link = mysql_connect("192.168.8.233", "fszqit", "1qaz@WSX") or die("连接失败：" . mysql_error());
//var_dump($link);
//echo "<br>";
//echo $link;
//echo "<br>";
//使用 MySQL 连接标识，查看连接标识：select connection_id();
if($link == 3){
    echo "与MySQL服务器建立的连接成功：<br>";
    echo mysql_get_client_info() . "<br>";
    echo mysql_get_host_info() . "<br>";
    echo mysql_get_proto_info() . "<br>";
    echo mysql_get_server_info() . "<br>";
    echo mysql_client_encoding() . "<br>";
    echo mysql_stat();
} else {
    echo '数据库连接失败<br>';
}

mysql_close($link);
?>

