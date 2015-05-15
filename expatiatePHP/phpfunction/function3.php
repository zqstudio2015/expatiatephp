<!DOCTYPE html>
<!--
文件名： function3.php
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
       
        function createtable($tableName,$rows,$cols) {
            $str_table = "";
            $str_table = "<table align='center' border='1' width='600'>";
            $str_table .= "<caption><h1>$tableName</h1></caption>";
            
            for($out=0;$out<$rows;$out++){
                if($out%2==0)
                    $bgcolor="#ffffff";
                else
                    $bgcolor="#dddddd";
                $str_table .= "<tr bgcolor=".$bgcolor.">";
                
                for($in=0;$in<$cols;$in++){
                    $str_table .= "<td>".($out*$cols+$in)."</td>";
                }
                $str_table .= "</tr>";
            }
            $str_table .= "</table>";
            
            return $str_table;
        }
        $str_table = createtable("第二个表三行四列", 3, 4);
        echo createtable("第一个表两行十列", 2, 10);
        echo $str_table;
        ?>
    </body>
</html>
