<!DOCTYPE html>
<!--
文件名： showdate.php
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
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
        echo date("M-d-Y",  mktime(0, 0, 0, 12, 36, 2007))."<br>";
        echo date("M-d-y",  mktime(0, 0, 0, 14, 1, 2008))."<br>";
        echo date("M-d-y",  mktime(0, 0, 0, 1, 1, 2009))."<br>";
        echo date("M-d-y",  mktime(0, 0, 0, 1, 1, 99))."<br>";
        echo date("Y-m-d H:i:s");
        ?>
    </body>
</html>
