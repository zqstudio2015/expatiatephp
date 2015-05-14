<!DOCTYPE html>
<!--
文件名： phpmark.php
字符编码：UTF-8  
版权所有:Copyright (C) 2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP语言标记</title>
        <!-- 在HTML中使用style标记嵌入CSS脚本 -->
        <style>
            body {
                margin: 0px;
                background: #ccc;
            }
        </style>
    </head>
    <body>
        <!-- 在HTML中使用script标记嵌入JavaScript脚本 -->
        <script type="text/javascript">
            document.write("客户端的时间： "+Date()+"<br>")
//            alert("客户端的时间： "+Date()+"<br>")
        </script>
        <?php
        echo "服务器的时间： ".  date("Y-m-d H:i:s")."<br>";
        ?>
    </body>
</html>
