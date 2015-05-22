<!DOCTYPE html>
<!--
文件名： preggrep.php
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>正则表达式－－－preg_grep</title>
    </head>
    <body>
        <?php
        $input_array = array("Linux CentOS 7", "Apache2.2.9", "MySQL5.5", "PHP5.4.26","LNMPA", "100");
        print_r("<pre>");
        print_r("原数组：<br>");
        print_r($input_array);
        $result_array = preg_grep("/^[a-zA-Z]+(\d|\.)+$/", $input_array); 
         print_r("匹配后的数组：<br>");
        print_r($result_array);
        ?>
    </body>
</html>
