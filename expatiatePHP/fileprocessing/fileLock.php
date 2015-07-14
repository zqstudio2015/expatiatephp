<!DOCTYPE html>
<!--
文件名： fileLock.php
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>网络留言板模式</title>
    </head>
    <body>
        <?php
        ini_set('display_errors', 1);
        //设置error_reporting错误级别
//        error_reporting(E_ALL);
        error_reporting(E_ERROR);
        $fileName = "text_data.txt";

        if (isset($_POST["sub"])) {
            $inputMessage = $_POST["username"] . "||" . $_POST["title"] . "||" . $_POST["mess"] . "<|>";
            writeMessage($fileName, $inputMessage);
        }

        if (file_exists($fileName)) {
            readMessage($fileName);
        }

        function writeMessage($filename, $message) {
            $fp = fopen($filename, "a") or die("文件打开失败");
            if (flock($fp, LOCK_EX+LOCK_NB)) {
                fwrite($fp, $message);
                flock($fp, LOCK_UN+LOCK_NB);
            } else {
                echo "不能锁定文件！";
            }
            fclose($fp);

        }

        function readMessage($filename) {
            $fp = fopen($filename, "r")or die("文件打开失败");;
            flock($fp, LOCK_SH);
            $buffer = "";
            while(!feof($fp)){
                $buffer .= fread($fp, 1024);
            }
            $data = explode("<|>", $buffer);
            foreach ($data as $line){
                list($username, $title, $message) = explode("||", $line);
                if($username != "" && $title != "" && $message !=""){
                    echo $username . '说：';
                    echo '&nbsp;'.$title.',';
                    echo $message."<hr>";
                }
            }
            flock($fp, LOCK_UN);
            fclose($fp);
        }
        ?>
        <form action ="" method="post">
            用户名：<input type="text" size ="10" name="username"><br>
            标&nbsp;&nbsp;题: <input type="text" size="30" name="title"><br>
            <textarea name="mess" rows=4 cols=38>请在这里输入留言信息</textarea>
            <input type="submit" name="sub" value="留言">
        </form>
    </body>
</html>
