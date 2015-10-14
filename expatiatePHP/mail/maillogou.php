<?php

/*
 * 文件名： maillogou.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
session_start();
$username = $_SESSION["username"];
$_SESSION = array();
if(isset($_COOKIE[session_name()])){
    setcookie(session_name(), '', time()-42000, '/');
}
session_destroy();
?>
<html>
    <head><title>退出系统</title></head>
    <body>
        <p><?php echo $username ?>再见！</p>
        <p><a href="maillogin.php">重新登录邮件系统</a></p>
    </body>
</html>

