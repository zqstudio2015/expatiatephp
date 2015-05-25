<!DOCTYPE html>
<!--
文件名： implode.php
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>把数组中的元素合并为一个字符串</title>
    </head>
    <body>
        <?php
        $lamp = array("Linux", "Apache", "MySQL", "PHP");
        echo implode("+", $lamp)."<br>";
        echo implode("+++", $lamp)."<br>";
        ?>
    </body>
</html>
