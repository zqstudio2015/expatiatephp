<!DOCTYPE html>
<!--
文件名： articlepublishedviewthread.php
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>显示文章</title>
    </head>
    <body>
        <?php
        require 'articlepublishedacticle_class.php';
        $acticle=new acticle($_POST["subject"], $_POST["message"], $_POST["parse"]);
        echo "<hr>";
        echo $acticle->getMessage();
        ?>
    </body>
</html>
