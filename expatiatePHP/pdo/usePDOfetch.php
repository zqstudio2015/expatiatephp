<?php

/*
 * 文件名： usePDOfetch.php
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

echo '<table border="1" align="center" width=90%>';
echo '<caption><h1>联系人信息表</h1></caption>';
echo '<tr bgcolor="#cccccc">';
echo '<th>UID</th><th>姓名</th><th>联系地址</th><th>联系电话</th><th>电子邮件</th></tr>';
$stmt = $db->query("select uid,name,address,phone,email from contactInfo");
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    echo '<tr>';
    echo '<td>'.$row["uid"].'</td>';
    echo '<td>'.$row["name"].'</td>';
    echo '<td>'.$row["address"].'</td>';
    echo '<td>'.$row["phone"].'</td>';
    echo '<td>'.$row["email"].'</td>';
    echo '</tr>';
}
echo '</table>';
?>

