<?php

/*
 * 文件名： excuteSQLFromResult4.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
//header("Content-Type:text/html;charset=utf-8");

$mysqli = new mysqli("192.168.8.233", "fszqit", "1qaz@WSX", "bookstore");
if(mysqli_connect_error()){
    printf("连接失败：%s<br>", mysqli_connect_error());
    exit();
}
$mysqli->query("set names utf-8");
$result = $mysqli->query("select bookId,bookName,bookAuthor,publishingHouse from books");

echo "结果数据表里面的数据列个数为：". $result->field_count. "列<br>";
echo "默认当前列的指针位置为第：". $result->current_field."列<br>";
echo "将指向当前列的指针移动到第二列：<br>";
$result->field_seek(1);
echo "只相当前列的指针为第：". $result->current_field."列<br>";
echo "第二列的信息如下所示：<br>";
$finfo = $result->fetch_field();
echo "列的名称：". $finfo->name."<br>";
echo "数据列来自数据表：".$finfo->table."<br>";
echo "本列最长字符串的长度：". $finfo->max_length."<br>";

$result->close();
$mysqli->close();
?>

