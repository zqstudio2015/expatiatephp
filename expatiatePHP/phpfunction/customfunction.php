<!DOCTYPE html>
<!--
文件名： customfunction.php
字符编码：UTF-8  
版权所有:Copyright (C) 2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require 'config.php';
        if($condition)
            include 'file.txt';
        else
            include('other.php');
        require('somefile.txt');
        ?>
    </body>
</html>
