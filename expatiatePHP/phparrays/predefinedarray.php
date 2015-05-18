<!DOCTYPE html>
<!--
文件名： predefinedarray.php
字符编码：UTF-8  
版权所有:Copyright (C) 2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>预定义数组</title>
    </head>
    <body>
        <?php
        echo '<h1>服务器变量</h1><br>';
        foreach($_SERVER as $key => $value){
            echo '$_SERVER['.$key.'] = '.$value.'<br>';
        }
        
        echo '<h1>环境变量变量</h1><br>';
        foreach($_ENV as $key => $value){
            echo '$_ENV['.$key.'] = '.$value.'<br>';
        }
        ?>
    </body>
</html>
