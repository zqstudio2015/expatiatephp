<!DOCTYPE html>
<!--
文件名： index.php
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>图形的周长和面积计算器</title>
    </head>
    <body>
        <?php

        function __autoload($classname) {
//            echo $classname;
            include("class_" . ($classname) . ".php");
        }
        ?>
    <center>
        <h2>图形的周长和面积计算器</h2>
        <hr>
        <a href="index.php?action=1">矩形</a> ||
        <a href="index.php?action=2">三角形</a> ||
        <a href="index.php?action=3">圆形</a><hr>
    </center>

    <?php
    if(!empty($_REQUEST["action"])) {
        switch ($_REQUEST["action"]) {
            case 1:
                $form = new form("矩形", $_REQUEST, "index.php");
                echo $form;
                break;
            case 2:
                $form = new form("三角形", $_REQUEST, "index.php", "post", "_blank");
                echo $form;
                break;
            case 3:
                $form = new form("圆形", $_REQUEST);
                echo $form;
                break;
            default:
                echo "请选择一个形状<br>";
        }

        if (isset($_REQUEST["act"])) {
            switch ($_REQUEST["act"]) {
                case 1:
                    $shape = new rect($_REQUEST);
                    break;
                case 2:
                    $shape = new triangle($_REQUEST);
                    break;
                case 3:
                    $shape = new circle($_REQUEST);
                    break;
            }
            echo "面积为：" . $shape->area() . '<br>';
            echo "周长为：" . $shape->perimeter() . '<br>';
        }
    }
    ?>
</body>
</html>
