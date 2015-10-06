<?php

/*
 * 文件名： excuteSQLMySQL_stmt.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
$mysqli = new mysqli("192.168.8.233", "fszqit", "1qaz@WSX", "bookstore");
if(mysqli_connect_error()){
    printf("连接失败：%s<br>", mysqli_connect_error());
    exit();
}

$query = "INSERT INTO books(bookCategoryId, bookName, bookAuthor, bookPrice, publishingHouse, publicationDate, BookDescription) VALUES(?, ?, ?, ?, ?, ?, ?)";
//$query = "INSERT INTO bookCategories(boo_bookCategoryId,bookCategoryName,bookCategoryDescription) VALUES(?,?,?)";
$stmt = $mysqli->prepare($query);

$stmt->bind_param('issdsss',$bookCategoryId, $bookName, $bookAuthor, $bookPrice, $publishingHouse, $publicationDate, $BookDescription);

$bookCategoryId = 1;
$bookName = "JavaScript";
$bookAuthor = "张三";
$bookPrice = 35.60;
$publishingHouse = "人民邮电出版社";
$publicationDate = "2010-09-06";
$BookDescription = "JavaScript";
$stmt->execute();

//$stmt->bind_param('sss',$boo_bookCategoryId,$bookCategoryName,$bookCategoryDescription);
//
//$boo_bookCategoryId = 1;
//$bookCategoryName = "半导体";
//$bookCategoryDescription = "只是测试1";
//$stmt->execute();

echo "插入的行数：". $stmt->affected_rows."<br>";
echo "自动增长的UID：". $mysqli->insert_id."<br>";

$bookCategoryId = 1;
$bookName = "JavaScript入门教程";
$bookAuthor = "李四";
$bookPrice = 88.00;
$publishingHouse = "人民邮电出版社";
$publicationDate = "2008-02-26";
$BookDescription = "JavaScript";
$stmt->execute();

echo "插入的行数：". $stmt->affected_rows."<br>";
echo "自动增长的UID：". $mysqli->insert_id."<br>";
$stmt->close();
$mysqli->close();
?>

