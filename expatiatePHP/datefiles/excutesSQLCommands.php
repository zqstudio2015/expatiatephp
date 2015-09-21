<?php

/*
 * 文件名： excutesSQLCommands.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
header("Content-Type:text/html;charset=utf-8");
$link = mysql_connect("192.168.8.233", "fszqit", "1qaz@WSX") or die("连接失败：" . mysql_error());
mysql_select_db('bookstore', $link) or die('不能选定数据库 bookstore：' . mysql_error());

//将插入3条的 INSERT 语句声明为一个字符串
$insert = "INSERT INTO books(bookCategoryId, bookName, bookAuthor, bookPrice, publishinghouse, BookDescription) VALUES "
        . "('1', 'PHP入门经典', '高某某', '80.00', '电子工业出版社', 'PHP入门类相关图书'), "
        . "('1', 'JSP入门经典', '洛某某', '50.00', '电子工业出版社', 'JSP入门类相关图书'), "
        . "('1', 'MySQL入门经典', '峰某某', '30.00', '电子工业出版社', 'MySQL入门类相关图书')";
$result3 = mysql_query($insert);
if($result3 && mysql_affected_rows()>0){
    echo "数据记录插入成功，最后一条的数据记录ID为：". mysql_insert_id(). "<br>";
} else {
    echo "数据记录插入失败，错误号：". mysql_errno(). "错误原因：". mysql_error(). "<br>";
}

//执行 UPDATE 命令修高表 books 中的一条记录，将图书名为 PHP入门经典 的记录价格修改为 79.90
$result1 = mysql_query("UPDATE books SET bookPrice='79.90' WHERE bookName='PHP入门经典'");
if($result1 && mysql_affected_rows() > 0){
    echo "数据记录修改成功<br>";
} else {
    echo "数据记录修改失败，错误号：". mysql_errno(). "错误原因：". mysql_error(). "<br>";
}

//执行 DELETE 命令删除表 books 中图书名为 JSP入门经典 的记录
$result2 = mysql_query("DELETE FROM books WHERE bookName='JSP入门经典' or bookName='PHP入门经典' or bookName='MySQL入门经典' ");
if($result2 && mysql_affected_rows() > 0){
    echo "数据记录删除成功<br>";
} else {
    echo "数据记录删除失败，错误号：". mysql_errno(). "错误原因：". mysql_error(). "<br>";
}

mysql_close($link);
?>

