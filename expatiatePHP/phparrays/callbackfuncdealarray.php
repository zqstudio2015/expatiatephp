<!DOCTYPE html>
<!--
文件名： callbackfuncdealarray.php
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>使用回调函数处理数组的函数</title>
    </head>
    <body>
        <?php
        print_r("<pre>");
        // array_filter()用回调函数过滤数组中的元素，返回新的数组。
        echo "<h3>array_filter()用回调函数过滤数组中的元素</h3>";
        function filterElementsOfArray($arrayElement){
            if($arrayElement % 2 ==0){
                return true;
            }
        }
        $simpleArray = array("a" => 1, "b" => 2, "c" => 3, "4" =>4);
        print_r(array_filter($simpleArray,"filterElementsOfArray"));
        print_r("<br>");
        
        //array_walk()对应数组中每个元素的回调函数处理，成功返回TRUE,否则返回FALSE。
        echo "<h3>array_walk()对应数组中每个元素的回调函数处理，成功返回TRUE,否则返回FALSE</h3>";
        function callbackElement($value, $key){
            echo "The key $key has the value $value<br>";
        }
        
        function callbackElement1($value, $key, $p){
            echo "$key $p $value<br>";
        }
        
        $lampas = array("a" => "Linux", "b" => "Apache", "c" => "PHP");
        array_walk($lampas, "callbackElement");        
        array_walk($lampas, "callbackElement1", "has the value");        
        print_r("<br>");
        
        //array_map()比array_walk灵活，作用到给定数组的元素。
        echo "<h3>array_map()比array_walk灵活，作用到给定数组的元素</h3>";
        function callbackOfElement($values){
            if($values === "MySQL"){
                return "Oracle";
            }
            return $values;
        }
        $lamp = array("Linux", "Apache", "MySQL", "PHP");
        print_r(array_map("callbackOfElement", $lamp));
        print_r("<br>");
        
        function callbackOfElement1($v1, $v2){
            if($v1 === $v2){
                return "same";
            }
            return "different";
        }
        $a1 = array( "a" => "Linux", "b" => "Apache", "c" => "MySQL", "d" => "PHP");
        $a2 = array( "e" => "Unix", "f" => "Apache", "g" => "Oracle", "h" => "PHP");
        print_r(array_map("callbackOfElement1", $a1, $a2));
        
        $a3 = array("Linux", "Apache");
        $a4 = array("Unix", "Oracle");
        print_r("<br>");
        print_r(array_map(null, $a3, $a4));
        ?>
    </body>
</html>
