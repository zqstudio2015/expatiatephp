<?php

/*
 * 文件名： excuteSQLMySQL_stmt2.php
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

//$query = "SELECT bookCategoryId,boo_bookCategoryId,bookCategoryName,bookCategoryDescription from bookCategories";
$query = "SELECT * from bookCategories";
if($stmt = $mysqli->prepare($query)){
    $stmt->execute();
    $stmt->store_result();
    echo "记录个数：".$stmt->num_rows."行<br>";
    $stmt->bind_result($bookCategoryId, $boo_bookCategoryId,$bookCategoryName,$bookCategoryDescription);
    while ($stmt->fetch()){
        printf("%s, %s, %s, %s)<br>", $bookCategoryId, $boo_bookCategoryId,$bookCategoryName,$bookCategoryDescription);
    }
    $stmt->close();
}
$mysqli->close();
?>

