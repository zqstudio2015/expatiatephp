<!DOCTYPE html>
<!--
文件名： error.php
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>错误测试报告</title>
    </head>
    <body>
        <?php
        //开启php.ini中的display_errors指令
        ini_set('display_errors', 1);
        //设置error_reporting错误级别
        error_reporting(E_ALL);
//        error_reporting(E_ERROR);
        gettype($var);
        gettype();
        get_type();
        
        //将错误记录到日志
        error_log("出错了！", 3, "/var/log/www/errors.log");
        
        ?>
    </body>
</html>
