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
        print_r(array_slice($lamp, -3, 2,TRUE));//从倒数第2开始由前向后取数；
//        print_r(array_slice($lamp, 2, -2));//由后向前取数；
        
        print_r("<h3>array_splice()选择数组中的一系列元素，删除或用其他值代替</h3>");
        $lamp1 = array("Linux", "Apache", "MySQL", "PHP");
        array_splice($lamp1, 2);
        print_r($lamp1);
        
        $lamp2 = array("Linux", "Apache", "MySQL", "PHP");
        echo '调用array_splice的返回数据:<br>';
        print_r(array_splice($lamp2, 1, -1));
        echo '数组被处理后的数据:<br>';
        print_r($lamp2);
        
        $lamp3 = array("Linux", "Apache", "MySQL", "PHP");
        array_splice($lamp3, 1, -1, array("web", "www"));
        print_r($lamp3);
        
        print_r("<h3>array_combine()通过合并两个数组形成新的数组,其中一组是键名一组是值</h3>");
        $a1 = array("OS", "WebServer", "DataBase", "Languages");
        $a2 = array("Linux", "Apache", "MySQL", "PHP");
        print_r(array_combine($a1, $a2));
        
        print_r("<h3>array_merge()把一个或多个数组合并为一个数组</h3>");
        $a3 = array("a" => "OS", "b" =>"WebServer", "c" =>"DataBase", "d" =>"Languages");
        $a4= array("a" =>"Linux", "b" =>"Apache", "C" =>"MySQL", "D" =>"PHP"); 
        print_r(array_merge($a3, $a4));
        
        print_r("<h3>array_intersect()计算数组的交集，返回同时出现在其他数组中的值</h3>");
        $a5 = array("Linux", "Apache", "MySQL", "PHP");
        $a6= array("Linux", "Tomcat", "MySQL", "JSP"); 
        print_r(array_intersect($a5, $a6));
        
        print_r("<h3>array_diff()返回两个数组的差集数组</h3>");
        print_r(array_diff($a5, $a6));
        print_r(array_diff($a6, $a5));
        
        ?>
    </body>
</html>
