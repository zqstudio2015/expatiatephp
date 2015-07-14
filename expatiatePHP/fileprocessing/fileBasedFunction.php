<?php

/*
 * 文件名： fileBasedFunction.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
if(copy('./data.txt', './testfbf/data1.txt')){
    echo "文件复制成功<br>";
} else {
    echo "文件复制失败<br>";
}

$fileName = "./testfbf/data1.txt";
if(file_exists($fileName)){
    if(unlink($fileName)){
        echo "文件删除成功<br>";
    } else {
        echo "文件删除失败<br>";
    }
} else {
    echo "目标文件不存在<br>";
}

if(rename('./demo.php', './demo.html')){
    echo "文件重命名成功<br>";
} else {
    echo "文件重命名失败<br>";
}

$fp = fopen('./data.txt', "r+") or die('文件打开失败<br>');
if(ftruncate($fp, 1024)){
    echo "文件截取成功<br>";
} else {
    echo "文件截取失败<br>";
}
?>

