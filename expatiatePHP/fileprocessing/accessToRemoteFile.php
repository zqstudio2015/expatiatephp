<?php

/*
 * 文件名： accessToRemoteFile.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
$file = fopen("http://www.baidu.com", "r") or die("打开远程文件失败!!");
while (!feof($file)){
    $line = fgets($file, 1024);
    if(preg_match("/<title>(.*)<\/title>/", $line, $out)){
        $title = $out[1];
//        print_r($out[0]);
        break;
    }
//    echo $line."<br>";
}
fclose($file);
echo $title;


?>

