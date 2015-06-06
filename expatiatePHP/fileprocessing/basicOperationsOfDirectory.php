<?php

/*
 * 文件名： basicOperationsOfDirectory.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

$path = "/homw/wwwroot/default/expatiatephp/index.php";

echo basename($path)."<br>";
echo basename($path, ".php")."<br>";

echo dirname($path)."<br>";
//echo dirname('c:/');

$path_parts = pathinfo($path);
echo $path_parts["dirname"]."<br>";
echo $path_parts["basename"]."<br>";
echo $path_parts["extension"]."<br>";
echo "<pre>";
print_r($path_parts)."<br>";
?>

