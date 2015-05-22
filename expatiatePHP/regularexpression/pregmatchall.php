<!DOCTYPE html>
<!--
文件名： pregmatch.php
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>正则表达式－－－preg_match_all</title>
    </head>
    <body>
        <?php
        $pattern = '/(https?|ftps?):\/\/(www)\.([^\.\/]+)\.(com|net|cn|org)(\.(com|net|cn|org))?(\/[\w-\.\/\?\%\&\=]*)?/i';
        $subject = "网站地址为 http://www.lamborther.net.cn/index.php的位置是LAMP兄弟连，"
                . "网站地址为 http://www.baidu.com/index.php的位置是百度，"
                . "网站地址为 http://www.google.com/index.php的位置是google";

        echo "<h3>PREG_SET_ORDER</h3>";
        $i = 1;        
        if (preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER)) {
//            echo "<pre>";
//            var_dump($matches);
//            echo "<br>";
            foreach ($matches as $urls) {
                echo "第" . $i . "个搜索到的URL为：" . $urls[0] . "<br>";
                echo "第" . $i . "个URL中的协议为：" . $urls[1] . "<br>";
                echo "第" . $i . "个URL中的主机为：" . $urls[2] . "<br>";
                echo "第" . $i . "个URL中的域名为：" . $urls[3] . "<br>";
                echo "第" . $i . "个URL中的顶域为：" . $urls[4] . "<br>";
                echo "第" . $i . "个URL中的子域为：" . $urls[6] . "<br>";
                echo "第" . $i . "个URL中的文件为：" . $urls[7] . "<br>";
                $i++;
                echo "<br>";
            }
        } else {
            echo "搜索失败！";
        }
        echo "<h3>PREG_PATTERN_ORDER</h3>";
        $j = 1;
        if (preg_match_all($pattern, $subject, $matches, PREG_PATTERN_ORDER)) {
//            var_dump($matches);
            foreach ($matches[0] as $urls) {
                echo "第" . $j . "个搜索到的URL为：" . $urls . "<br>";
                echo "第" . $j . "个URL中的协议为：" . $matches[1][$j - 1] . "<br>";
                echo "第" . $j . "个URL中的主机为：" . $matches[2][$j - 1] . "<br>";
                echo "第" . $j . "个URL中的域名为：" . $matches[3][$j - 1] . "<br>";
                echo "第" . $j . "个URL中的顶域为：" . $matches[4][$j - 1] . "<br>";
                echo "第" . $i . "个URL中的子域为：" . $matches[6][$j - 1] . "<br>";
                echo "第" . $j . "个URL中的文件为：" . $matches[7][$j - 1] . "<br>";
                $j++;
                echo "<br>";
            }
        } else {
            echo "搜索失败！";
        }
        ?>
    </body>
</html>
