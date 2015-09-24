<?php

/*
 * 文件名： usingMysqliResult.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
header("Content-Type:text/html;charset=utf-8");
$mysqli = new mysqli("192.168.8.233", "fszqit", "1qaz@WSX", "bookstore");
if (mysqli_connect_errno()) {
    printf("连接失败：％s\n", mysqli_connect_error());
    exit();
}
echo '<pre>';

$result1 = $mysqli->query("select * from bookCategories");
//var_dump($result1);
while($row = $result1->fetch_row()){
    echo $row[2].'<br>';
}
mysqli_free_result($result1);
echo '<br>';

$result2 = $mysqli->query("select * from books", MYSQLI_USE_RESULT);
//var_dump($result2);
while($row = $result2->fetch_assoc()){
    echo $row["bookName"].'<br>';
}
mysqli_free_result($result2);
echo '<br>';

$mysqli->real_query("select * from bookCategories");
$result3 = $mysqli->store_result();
var_dump($result3);
mysqli_free_result($result3);

$mysqli->close();
?>

