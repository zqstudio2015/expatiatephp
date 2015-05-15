<!DOCTYPE html>
<!--
文件名： function1.php
字符编码：UTF-8  
版权所有:Copyright (C) 2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>通过函数输出表格</title>
    </head>
    <body>
        <?php
        createtable();
        function createtable() {
            echo "<table align='center' border='1' width='600'>";
            echo "<caption><h1>通过函数输出表格</h1></caption>";
            
            for($out=0;$out<10;$out++){
                if($out%2==0)
                    $bgcolor="#ffffff";
                else
                    $bgcolor="#dddddd";
                echo "<tr bgcolor=".$bgcolor.">";
                
                for($in=0;$in<10;$in++){
                    echo "<td>".($out*10+$in)."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        createtable();
        ?>
    </body>
</html>
