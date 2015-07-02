<?php

/*
 * 文件名： accessToRemoteFile1.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
        ini_set('display_errors', 1);
        //设置error_reporting错误级别
//        error_reporting(E_ALL);
        error_reporting(E_ERROR);
$file = fopen("ftp://fszqit:1qaz@WSX@192.168.8.233/expatiatephp/fileprocessing/delfolder/file4.txt", "w");
fwrite($file, "Linux+Apache+MySQL+PHP");
fclose($file);
?>

