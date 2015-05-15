<!DOCTYPE html>
<!--
文件名： variablefunc.php
字符编码：UTF-8  
版权所有:Copyright (C) 2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>变量函数</title>
    </head>
    <body>
        <?php
        function one($a, $b){
            return $a + $b;
        }
        
        function two($a, $b){
            return $a*$a + $b*$b;
        }
        
        function three($a, $b){
            return $a*$a*$a + $b*$b*$b;
        }
        
        $result = "one";
//        $result = "two";
//        $result = "three";
        echo "运算结果是：".$result(2, 3);
        ?>
    </body>
</html>
