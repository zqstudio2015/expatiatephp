<!DOCTYPE html>
<!--
文件名： filesystem.php
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>文件目录操作系统</title>
    </head>
    <body bgcolor="#fafad2" link="#4c4c99" alink="#4c4c99">
    <center><h1>文件目录操作系统</h1></center>
        <?php

        function __autoload($className) {
            include $className."_class.php";
        }

        if (isset($_POST["action"])) {
            $fileaction = new FileAction($_POST["dirname"], $_POST["action"]);
            $fileaction->option();
        }

        if (isset($_GET["dirname"])) {
            $fs = new FileSystem($_GET["dirname"]);
        } else {
            $fs = new FileSystem();
        }
        echo "<hr>";
        $fs->getMenu();
        echo "<hr>";
        $fs->fileList();
        echo '<br><font size=2 color="#005500">';
        echo $fs->getDirInfo();
        echo $fs->getDiskSpace();
        echo "</font>";
        ?>
    <hr>
    <center>作者：BetterFeng 版本1.0 编写时间：2015－09－07</center>
    </body>
</html>
