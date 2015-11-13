<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>图形计算器</title>
    </head>
    <body>
    <center>
        <h1>图形计算器</h1>
        <a href="index.php?action=rect">矩形</a>
        <a href="index.php?action=circle">圆形</a>
        <a href="index.php?action=triangle">三角形</a>
        <hr>

        <?php

        function __autoload($className) {
            include $className . ".class.php";
        }

        new formController();

        if (isset($_POST["sub"]) ? $_POST["sub"] : FALSE) {
            echo new calculationController();
        }
        ?>
    </center>
</body>
</html>
