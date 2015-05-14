<!DOCTYPE html>
<!--
文件名： relativepath.php
字符编码：UTF-8  
版权所有:Copyright (C) 2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Relative Path</title>
    </head>
    <body>
        <?php
        $testvalue1 = intval(true);
        $testvalue2 = intval(false);
        echo "<h3>$testvalue1</h3>";
            echo '<a><img src="../../expatiatephp/cssbase/images/animegirl.jpg" alt="动漫女孩" width="300"/></a><br>';
            echo '文件名：'.__FILE__."<br>";
            echo '当前行：'.__LINE__."<br>";
            echo '当前PHP服务器：'.PHP_OS."<br>";
            echo '当前PHP版本：'.PHP_VERSION."<br>";
            $val = true?1:0;
            echo $val."<br>";
        ?>
    </body>
</html>
