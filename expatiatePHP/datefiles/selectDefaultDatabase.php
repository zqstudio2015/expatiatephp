<?php

/*
 * 文件名： selectDefaultDatabase.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
header("Content-Type:text/html;charset=utf-8");
$link = mysql_connect("192.168.8.233", "fszqit", "1qaz@WSX") or die("连接失败：" . mysql_error());
mysql_select_db('bookstore', $link) or die('不能选定数据库 bookstore：' . mysql_error());
mysql_close($link);
?>

