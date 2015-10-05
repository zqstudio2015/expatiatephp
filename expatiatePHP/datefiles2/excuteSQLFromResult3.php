<?php

/*
 * 文件名： excuteSQLFromResult3.php
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

echo '<table width="90%" border="1" align="center">';
echo '<caption><h1>书籍信息表</h1></caption>';
echo '<th>书籍编号</th><th>书籍名称</th><th>作者</th><th>出版社</th>';
while($rowObj=$result->fetch_object()){
    echo '<tr align="center">';
    echo '<td>'. $rowObj->bookId. '</td>';
    echo '<td>'. $rowObj->bookName. '</td>';
    echo '<td>'. $rowObj->bookAuthor. '</td>';
    echo '<td>'. $rowObj->publishingHouse. '</td>';
    echo '</tr>';
}
echo '</table>';
$result->close();
$mysqli->close();
?>

