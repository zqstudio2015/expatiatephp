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
    </head>
    <body>
        <div>
            <form action="uploadtest.php" method = "post" enctype= "multipart/form-data" >
                <input type="hidden" name="action" value="upload">
                <input type="hidden" name="dirname" value="/home/wwwroot/default/expatiatephp/filesystem/updates/">
                上传文件：<input type="file" multiple="multiple" name="upfile[]" >
                <input type="submit" value="上传">
            </form>
        </div>
        <?php
        function __autoload($className) {
            include $className."_class.php";
        }
        
if (isset($_POST["action"])) {    
            $fileaction = new uploadFilesMulti2($_POST["dirname"]);
            $resultArray = $fileaction->uploadFile($_FILES["upfile"]);
            asort($resultArray);
            exit(json_encode($resultArray));
        }
        ?>
    </body>
</html>
