<?php

/*
 * 文件名： index.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
//var_dump($_COOKIE);
if($_COOKIE["isLogin"]){
    echo '你好：'.$_COOKIE['username'].'&nbsp;&nbsp;';
    echo '<a href="login.php?action=logout">退出</a>';
} else {
    header("Location:login.php");
    exit;
}
?>
<html>
    <head><title>网站主页面</title></head>
    <body>
        <p>这里显示网页的主题内容</p>
    </body>
</html>

