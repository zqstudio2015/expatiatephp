<!DOCTYPE html>
<!--
文件名： uploadfile.php
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>多个文件上传</title>
    </head>
    <body>
        <?php
//        echo date('YmdHis', time())
        ?>
        <form action="mul_upload1.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="30000000">
            选择文件:<input type="file" multiple="multiple" name="myfile[]">
            <input type="submit" value="上传文件">
            
        </form>
    </body>
</html>
