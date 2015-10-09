<?php

/*
 * 文件名： usePDOQuery.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
try{
    $db = new PDO('mysql:host=192.168.8.233;dbname=testdb', 'fszqit', '1qaz@WSX');
//    echo '数据库连接成功！';
} catch (Exception $ex) {
    echo '数据库连接失败：' .$ex->getMessage();
    exit;
}
$query = "SELECT name,phone,email FROM contactInfo WHERE departmentId='D01'";
try{
    $pdostatement = $db->query($query);
    echo "一共从表中获取到：" .$pdostatement->rowCount(). "条记录：<br>";
    foreach($pdostatement as $row){
        echo $row['name']. "\t";
        echo $row['phone']. "\t";
        echo $row['email']. "<br>";
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
    print_r($db->errorInfo());
}
?>

