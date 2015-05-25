<!DOCTYPE html>
<!--
文件名： pregsplit.php
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>字符串分割和链接</title>
    </head>
    <body>
        <?php
        print_r("<pre>");
        $keywords = preg_split("/[\s,]+/",  "hypertext language, programming");
        print_r($keywords);
        
        $chars =  preg_split("//", "lamp", -1, PREG_SPLIT_NO_EMPTY);
        print_r($chars);
        ?>
    </body>
</html>
