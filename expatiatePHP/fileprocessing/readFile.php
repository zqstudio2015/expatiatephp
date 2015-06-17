<?php

/*
 * 文件名： readFile.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
$fileName = "data.txt";
$handle = fopen($fileName, "r") or die("文件打开失败");
$contents = fread($handle, 100);
fclose($handle);
echo $contents;

//从文件中读取全部内容忖道一个变量中，每次读取一部分，循环读取。
$fileName = "somepic.gif";
$handle = fopen($fileName, "rb") or die("文件打开失败");
$contents = "";
while (!feof($handle)){
    $contents .= fread($handle, 1024);
}
fclose($handle);
echo $contents;

//另一种从文件中读取全部内容的方法
$fileName = "data1.txt";
$handle = fopen($fileName, "r") or die("文件打开失败");
$contents = fread($handle, filesize($fileName));
fclose($handle);
echo $contents;
?>

