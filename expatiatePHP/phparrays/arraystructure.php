<!DOCTYPE html>
<!--
文件名： arraystructure.php
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>数组与数据结构</title>
    </head>
    <body>
        <?php
        print_r("<pre>");
        
        $lamp = array("Web");
        echo array_push($lamp, "Linux")."<br>";
        print_r($lamp);
        echo array_push($lamp, "Apache", "MySQL", "PHP", "PHP")."<br>";
        print_r($lamp);
        echo array_pop($lamp);
        print_r($lamp);        
        echo array_shift($lamp);
        print_r($lamp);
        print_r($lamp[array_rand($lamp,1)]);
        ?>
    </body>
</html>
