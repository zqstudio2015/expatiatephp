<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        ﻿<script type="text/javascript">
//            function checkField(val)
//            {
//                document.getElementById("textfield").value = val;
//            }
            function checkField()
            {
                var file2 = document.getElementById("file").value;

                document.getElementById("textfield").value = file2;
            }
        </script>
    </head>
    <body>
        <?PHP
        echo '<input type="hidden" name="action" value="upload">';
        echo '<input type="text" name="textfield" id="textfield" class="txt" >';
        echo '上传文件：<input type="file" name="upfile" >';
        echo '﻿<input type="submit" name="submit" onclick="checkField()"> ';
//        echo '<br><input type="submit" value="上传">';
        ?>
    </body>
</html>
