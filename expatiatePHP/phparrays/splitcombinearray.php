<!DOCTYPE html>
<!--
文件名： splitcombinearray.php
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>拆分、合并、分解和结合数组</title>
    </head>
    <body>
        <?php
        print_r("<pre>");
        print_r("<h3>array_slice()在数组中根据条件取出一段值并返回</h3>");
        $lamp = array("Linux", "Apache", "MySQL", "PHP");
        print_r(array_slice($lamp, 1, 2));//由前向后取数；
        print_r(array_slice($lamp, -2, 2));//从倒数第2开始由前向后取数；
        print_r(array_slice($lamp, 2, -2));//由后向前取数；
        
        ?>
    </body>
</html>
