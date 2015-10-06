<?php

/*
 * 文件名： excuteSQLMultiQuery.php
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

$query = "SET NAMES utf8;";
$query .= "SELECT CURRENT_USER();";
$query .= "select bookId,bookName,bookAuthor,publishingHouse from books";

if ($mysqli->multi_query($query)){
//    do {
//        if ($result = $mysqli->store_result()){
//            while($row = $result->fetch_row()){
//            foreach ($row as $data){
//                echo $data."&nbsp;&nbsp;";
//            }
//            echo "<br>";
//            }
//            $result->close();
//        }
//        if($mysqli->more_results()){
//            echo "------------------------------<br>";
//        }
//    } while($mysqli->next_result());
         while($mysqli->next_result()) {
        if ($result = $mysqli->store_result()){
            while($row = $result->fetch_row()){
            foreach ($row as $data){
                echo $data."&nbsp;&nbsp;";
            }
            echo "<br>";
            }
            $result->close();
        }
        if($mysqli->more_results()){
            echo "------------下一条SQL语句------------------<br>";
        }
    }
    $mysqli->close();
}
?>

