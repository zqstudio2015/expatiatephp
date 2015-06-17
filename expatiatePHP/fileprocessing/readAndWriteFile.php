<?php

/*
 * 文件名： readAndWriteFile.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

//开启php.ini中的display_errors指令
ini_set('display_errors', 1);
//设置error_reporting错误级别
error_reporting(E_ALL);
$handle = fopen("/home/wwwroot/default/expatiatephp/fileprocessing/delfolder/file.txt", "r");
$handle = fopen($_SERVER['DOCUMENT_ROOT'] . "/expatiatephp/fileprocessing/delfolder/inf.txt", "r");
//$handle = fopen("c:\\data\\file.gif", "wb");
//$handle = fopen("../data/info.txt", "r");
$handle = fopen("http://192.168.8.233", "r");
$handle = fopen("ftp://fszqit:1qaz@WSX@192.168.8.233/expatiatephp/somefile.txt", "w");
?>

