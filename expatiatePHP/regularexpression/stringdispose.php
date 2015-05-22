<!DOCTYPE html>
<!--
文件名： stringdispose.php
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>字符串处理函数</title>
    </head>
    <body>
        <?php
        $input_string = "This is a test of string dispose.";
        echo "输入的字符串：".$input_string."<br>";
        echo "处理后的字符串：".strstr($input_string, "test")."<br>";
        //获取文件名
        function get_file_name($url){
            $location = strrpos($url, "/")+1;
            $file_name = substr($url, $location);
            return $file_name;
        }
        echo get_file_name("http://bbs.lampbrother.net/index.php")."<br>";
        echo get_file_name("http://bbs.lampbrother.net/Sharp/logo.fig")."<br>";
        echo get_file_name("file:///C:/WINDOWS/php.ini")."<br>";
        
        $pattern = "/<[\/\!]*?[^<>]*?>/is";
        $text = "这个文本中有<b>粗体</b>和<u>带下划线</u>以及<i>斜体</i>还有<font color='red' size='7'>带有颜色和字体大小</font>的标记";
        echo $text.'<br>';
        echo preg_replace($pattern, "", $text);
        echo "<br>";
        echo preg_replace($pattern, "", $text, 4)."<br>";
        //反向引用
        $pattern1 = "/(\d{2})\/(\d{2})\/(\d{4})/";
        $text1 = "今年春节房价日期为01/25/2009到02/02/2009共7天";
        echo preg_replace($pattern1, "\\3-\\1-\\2", $text1)."<br>";
        echo preg_replace($pattern1, "\${3}-\${1}-\${2}", $text1)."<br>";
        ?>
    </body>
</html>
