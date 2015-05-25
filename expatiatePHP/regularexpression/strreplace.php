<!DOCTYPE html>
<!--
文件名： strreplace.php
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>字符串替换</title>
    </head>
    <body>
        <?php
        $str = "LAMP是目前流行的WEB开发平台；<br>
                LAMP是B/S架构软件开发的黄金组合；<br>
                LAMP每个成员都是开源软件；<br>
                lampBrother是LAMP的技术社区。<br>";
        echo str_replace("LAMP", "Linux+Apache+MySQL+PHP", $str, $count);
        echo "区分大小写时共替换：".$count."次<br>";
        echo str_ireplace("LAMP", "Linux+Apache+MySQL+PHP", $str, $counti);
        echo "区分大小写时共替换：".$counti."次<br>";
        
        $seaches = array("http", "www", "jsp", "com");
        $replace = array("ftp", "bbs", "php", "net");
        $url = "http://www.jspbrother.com/index.jsp";
        echo "原链接：".$url."<br>";
        echo "替换后：".str_replace($seaches, $replace, $url)."<br>";
        ?>
    </body>
</html>
