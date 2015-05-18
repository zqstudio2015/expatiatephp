<!DOCTYPE html>
<!--
文件名： funcofdealwitharray.php
字符编码：UTF-8  
版权所有:Copyright (C) 2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>数组的相关处理函数</title>
    </head>
    <body>
        <?php
        //array_values()返回数组中所有元素的值，被返回的数组将使用顺序的数值键，重新建立索引，从0开始且以1递增，适用于数组元素下表混乱的数组。
        print_r("<h3>array_values()返回数组中所有元素的值</h3>");
        $contact = array("ID" => 1, "姓名" => "高某", "公司" => "A公司", "地址" => "北京市", "电话" => "(010)114");
         print_r('<pre>');
        print_r(array_values($contact));
        
        print_r($contact);
        
        
         //array_keys()返回数组中所有的键名。指定第二个参数，将返回对应值的键名。
        print_r("<h3>array_keys()返回数组中所有元素的键</h3>");
        $lampas = array("a" => "Linux", "b" => "Apache", "c" => "MySQL", "d" => "PHP");
        print_r(array_keys($lampas));
        
        print_r(array_keys($lampas, "Apache"));
        
        //in_array()检查数组中是否存在某个值
        print_r("<h3>in_array()检查数组中是否存在某个值</h3>");
        $os = array("Mac", "NT", "Irix", "Linux");
        if(in_array("Irix", $os)){
            echo "Got Irix";
        } else {
            echo "Errot";
        }
        
        //array_flip()交换数组中的键和值，返回一个键值调换后的数组。注意如果键值相同会发生冲突。
        print_r("<h3>array_flip()交换数组中的键和值，返回一个键值调换后的数组</h3>");
        $lampas1 = array("OS" => "Linux", "WebServer" => "Apache", "Database" => "MySQL", "Language" => "PHP");
        print_r(array_flip($lampas1));
        
        //array_reverse()将原数组中的元素顺序反转，并返回；
        print_r("<h3>array_reverse()将原数组中的元素顺序反转，并返回</h3>");
        $lampas2 = array("OS" => "Linux", "WebServer" => "Apache", "Database" => "MySQL", "Language" => "PHP");
        print_r(array_reverse($lampas2));
        
        //count()统计数组元素的个数
        print_r("<h3>count()统计数组元素的个数</h3>");
        $lampas = array("Linux", "Apache", "MySQL", "PHP");
        
        print_r(count($lampas));
        print_r("<br>");
        $lamps = array("lamp" => array("Linux", "Apache", "MySQL", "PHP"), 
                        "j2ee" => array("Unix", "Tomcat", "Oracle", "JSP"));
        
        print_r(count($lamps, 1));
        print_r("<br>");
        print_r(count($lamps));
        
        //array_count_values()统计数组中所有值出现的次数。
        print_r("<h3>array_count_values()统计数组中所有值出现的次数</h3>");
        $repeatvaluesarray = array("1", "php", "1", "php", "MySQL", "mysql");
        print_r(array_count_values($repeatvaluesarray));
        
        //array_unique删除数组中的重复值。
        print_r("<h3>array_unique()删除数组中的重复值</h3>");
//        $repeatvaluesarray = array("1", "php", "1", "php", "MySQL", "mysql");
        print_r(array_unique($repeatvaluesarray));
        
        ?>
    </body>
</html>
