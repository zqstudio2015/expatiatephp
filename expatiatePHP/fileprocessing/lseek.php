<?php

/*
 * 文件名： lseek.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

$fp = fopen('data.txt', 'r') or die("文件打开失败");
echo ftell($fp)."<br>";
echo fread($fp, 10)."<br>";
echo ftell($fp)."<br>";
fseek($fp, 100, SEEK_CUR);
echo ftell($fp)."<br>";
echo ftell($fp)."<br>";
echo fread($fp, 10)."<br>";
echo ftell($fp)."<br>";
fseek($fp, -10, SEEK_END);
echo fread($fp, 10)."<br>";
rewind($fp);
echo ftell($fp)."<br>";

fclose($fp);
?>

