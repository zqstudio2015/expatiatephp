<?php

/*
 * 文件名： excuteSQLFromResult.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

header("Content-Type:text/html;charset=utf-8");

$mysqli = new mysqli("192.168.8.233", "fszqit", "1qaz@WSX", "bookstore");
if(mysqli_connect_error()){
    printf("连接失败：%s<br>", mysqli_connect_error());
    exit();
}
//$mysqli->query("set names gb2312");
$result = $mysqli->query("select bookName,bookAuthor from books where bookCategoryId=1");
echo '书籍的名称和作者：';
echo '<ol>';
while (list($name, $author)=$result->fetch_row()){
    echo '<li>'. $name. ':'. $author. '</li>';
}
echo '</ol>';
$result->close();
$mysqli->close();
?>

