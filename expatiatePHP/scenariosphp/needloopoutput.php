<!DOCTYPE html>
<!--
文件名： needloopoutput.php
字符编码：UTF-8  
版权所有:Copyright (C) 2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table align="center" border="1" width="600">
            <caption><h1>使用while循环嵌套输出表格</h1></caption>
            <?php
            $out = 0;
            while($out < 10){
                if($out%2)
                    $bgcolor = "#ffffff";
                else 
                    $bgcolor = "#dddddd";
                echo "<tr bgcolor=".$bgcolor.">";
                $in = 0;
                while ($in < 10){
                    echo "<td>".($out*10+$in)."</td>";
                    $in++;
                }
                echo "</tr>";
                $out++;
            }
            ?>
        </table>
    </body>
</html>
