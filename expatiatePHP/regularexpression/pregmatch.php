<!DOCTYPE html>
<!--
文件名： pregmatch.php
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>正则表达式－－－preg_match</title>
    </head>
    <body>
        <?php
        $pattern = '/(https?|ftps?):\/\/(www)\.([^\.\/]+)\.(com|net|org)(\/[\w-\.\/\?\%\&\=]*)?/i';
        $subject = "网站地址为 http://www.lamborther.net/index.php的位置是LAMP兄弟连";
        
        if(preg_match($pattern, $subject, $matches)){
            echo "搜索到的URL为：".$matches[0]."<br>";
            echo "URL中的协议为:".$matches[1]."<br>";
            echo "URL中的主机为:".$matches[2]."<br>";
            echo "URL中的域名为:".$matches[3]."<br>";
            echo "URL中的顶域为:".$matches[4]."<br>";
            echo "URL中的文件为:".$matches[5]."<br>";
        } else {
            echo "搜索失败！";
        }
        ?>
    </body>
</html>
