<?php

/*
 * 文件名： excuteSQL.php
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

if ($mysqli->query("insert into bookCategories(boo_bookCategoryId,bookCategoryName,bookCategoryDescription) values(1,'PHP书籍','PHP相关书籍')")) {
    echo "改变的记录数：" . $mysqli->affected_rows . "<br>";
    echo "新插入的 ID 值：" . $mysqli->insert_id . "<br>";
}
$mysqli->close();
?>

