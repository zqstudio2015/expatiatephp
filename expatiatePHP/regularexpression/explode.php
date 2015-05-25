<!DOCTYPE html>
<!--
文件名： explode.php
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>explode分割字符串</title>
    </head>
    <body>
        <?php
        $lamp = "Linux Apache MySQL PHP";
        $lampbrother = explode(" ", $lamp);
        echo $lampbrother[2]."<br>";
        echo $lampbrother[3]."<br>";
        
        $password = "redhat:*:500:508::/home/redhat:/bin/bash";
        list($user, $pass, $uid, $gid, ,$home, $shell)=  explode(":", $password);
        echo $user."<br>";
        echo $pass."<br>";
        echo $uid."<br>";
        echo $gid."<br>";
        echo $home."<br>";
        echo $shell."<br>";
        
        $lamp1 = "Linux+Apache+MySQL+PHP";
        print_r(explode('+', $lamp1,2));
        print_r("<br>");
        print_r(explode('+', $lamp1,-1));
        
        ?>
    </body>
</html>
