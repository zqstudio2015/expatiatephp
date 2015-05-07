<!DOCTYPE html>
<!--
  Filename: cssbase01.php
  Encoding: UTF-8
  Author: BetterFeng
  Link: http://www.fszqit.com
  Copyright: Copyright (c)2015-2005 佛山市昭群移动应用工作室 All rights Reserved. 
  Datetime: 2015-5-7  17:00:58
  Version: 1.0
  Description:
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>简单CSS实例制作</title>
        //嵌入式样表
        <style>
            p{
                font-size: 30px;
                color: yellow;
                border: 2px solid blue;
                text-align: center;
                background: green;
            }
        </style>
    </head>
    <body>
        <?php
            echo "<p>Linux</P>";
            echo "<p>Apache</P>";
            echo "<p>MySQL</P>";
            echo "<p>PHP</P>";
        ?>
    </body>
</html>
