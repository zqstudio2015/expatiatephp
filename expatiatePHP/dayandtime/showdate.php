<!DOCTYPE html>
<!--
文件名： showdate.php
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo date("M-d-Y",  mktime(0, 0, 0, 12, 36, 2007))."<br>";
        echo date("M-d-y",  mktime(0, 0, 0, 14, 1, 2008))."<br>";
        echo date("M-d-y",  mktime(0, 0, 0, 1, 1, 2009))."<br>";
        echo date("M-d-y",  mktime(0, 0, 0, 1, 1, 99))."<br>";
        echo date("Y-m-d H:i:s")."<br>";
        echo date("Y年m月d日 H时i分s秒")."<br>";
        
        $year = 1981;
        $month = 11;
        $day = 05;
        $birthday = mktime(0, 0, 0, $month, $day, $year);
        $nowdate = time();
        echo $nowdate."<br>";
        echo date("Y-m-d H:i:s", $nowdate)."<br>";
        $ageunix = $nowdate - $birthday;
        $age = floor($ageunix/(60*60*24*365));
        echo "年龄：$age"."<br>";
        echo '<pre>';
        var_dump( getdate());
        ?>
    </body>
</html>
