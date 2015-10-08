<?php

/*
 * 文件名： usePDOConectMySQL.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
$dsn = 'mysql:dbname=bookstore;host=192.168.8.233';
$user = 'fszqit';
$password = '1qaz@WSX';
try{
    $dbh = new PDO($dsn, $user, $password);
    echo '数据库连接成功！';
} catch (Exception $ex) {
    echo '数据库连接失败：' .$ex->getMessage();
}
echo "<br> PDO是否关闭自动提交功能：" .$dbh->getAttribute(PDO::ATTR_AUTOCOMMIT);
echo "<br> 当前PDO的错误处理的模式：" .$dbh->getAttribute(PDO::ATTR_ERRMODE);
echo "<br> 表字段字符的大小写转换：" .$dbh->getAttribute(PDO::ATTR_CASE);
echo "<br> 与连接状态相关特有信息：" .$dbh->getAttribute(PDO::ATTR_CONNECTION_STATUS);
echo "<br> 空字符串转换为SQL的null：" .$dbh->getAttribute(PDO::ATTR_ORACLE_NULLS);
echo "<br> 应用程序提前获取数据大小：" .$dbh->getAttribute(PDO::ATTR_PERSISTENT);
echo "<br> 与数据库特有的服务器信息：" .$dbh->getAttribute(PDO::ATTR_SERVER_INFO);
echo "<br> 数据库服务器版本号信息：" .$dbh->getAttribute(PDO::ATTR_SERVER_VERSION);
echo "<br> 数据库客户端版本号信息：" .$dbh->getAttribute(PDO::ATTR_CLIENT_VERSION);
?>

