<?php

/*
 * 文件名： connect.inc.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
$host = "192.168.8.233";
$dbusr = "fszqit";
$dbpass = "1qaz@WSX";
$dbname = "testmail";
$mysqli = new mysqli($host, $dbusr, $dbpass, $dbname);
if(mysqli_connect_errno()){
    printf("连接失败%s\n",  mysqli_connect_error());
    exit();
}
?>

