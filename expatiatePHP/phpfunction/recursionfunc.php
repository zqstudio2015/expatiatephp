<!DOCTYPE html>
<!--
文件名： recursionfunc.php
字符编码：UTF-8  
版权所有:Copyright (C) 2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>递归函数</title>
    </head>
    <body>
        <?php
        function recursionfunc($n){
            echo $n."&nbsp;&nbsp;";
            if($n>0)
                recursionfunc ($n-1);
            else
                echo "<...>&nbsp;&nbsp;";
            echo $n."&nbsp;&nbsp;";
        }
        recursionfunc(10);
        ?>
    </body>
</html>
