<?php

/*
 * 文件名： index.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
require "MyTpl2_class.php";

$mysqli = new mysqli("192.168.8.233", "fszqit", "1qaz@WSX", "testdb");

if($result = $mysqli->query("SELECT id,name,sex,age,email FROM users")){
    while($row = $result->fetch_assoc()){
        $users[] = $row;
    }
    $rowNum = $result->num_rows;
    $result->close();
}
$mysqli->close();

$tpl = new MyTpl2("./templates/", "./templates_c");
$tpl->assign("title", "自定义模版引擎示例");
$tpl->assign("tableName", "用户信息表");
$tpl->assign("author", "BetterFeng");
$tpl->assign("users", $users);
$tpl->assign("rowNum", $rowNum);
$tpl->display("main.tpl");
?>

