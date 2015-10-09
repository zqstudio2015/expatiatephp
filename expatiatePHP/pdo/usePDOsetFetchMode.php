<?php

/*
 * 文件名： usePDOsetFetchMode.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
try{
    $db = new PDO('mysql:host=192.168.8.233;dbname=testdb', 'fszqit', '1qaz@WSX');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo '数据库连接成功！';
} catch (Exception $ex) {
    echo '数据库连接失败：' .$ex->getMessage();
    exit;
}

$query = "SELECT uid,name,phone,email FROM contactInfo WHERE departmentId='D01'";
try{
    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->bindColumn(1,$uid);
    $stmt->bindColumn(2,$name);
    $stmt->bindColumn('phone',$phone);
    $stmt->bindColumn('email',$email);
    
    while($row = $stmt->fetch(PDO::FETCH_BOUND)){
        echo $uid."\t".$name."\t".$phone."\t".$email."<br>";
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>

