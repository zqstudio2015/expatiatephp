<!DOCTYPE html>
<!--
文件名： phpmark3.php
字符编码：UTF-8  
版权所有:Copyright (C) 2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>开启PHP模式的四对不同开始和结束标记</title>
    </head>
    <body>
        <?php
            echo "1.这个标记识标准的PHP语言标记。<br>";
        ?>
        <script language="php">
            echo "2.这个标记是脚本风格，是最长的标记。<br>";
        </script>
        <? echo "3.这个标记是最简短风格<br>"; ?>
        <?=$expression ?>这也是一种简写，等价于。<br>
        <? echo $expression ?>这也是一种简写,上一行。<br>
        <% echo "4.这个标记类似于ASP标签的写法。<br>"; %>
        <%=$expression %>这也是一种简写，等价于<% echo $expression %>
    </body>
</html>
