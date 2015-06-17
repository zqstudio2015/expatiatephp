<?php

/*
 * 文件名： fileProperties.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

function getFilePro($fileName){
    if(!file_exists($fileName)){
        echo "目标文件不存在！！<br>";
        return;
    }
    
    if(is_file($fileName)){
        echo $fileName."是一个文件<br>";
    }
    
    if(is_dir($fileName)){
        echo $fileName."是一个目录";
    }
    
    echo "文件型态：".getFileType($fileName)."<br>";
    echo "文件型态：".getFileSize(filesize($fileName))."<br>";
    
    if(is_readable($fileName)){
        echo "文件可读<br>";
    }
    
    if(is_writable($fileName)){
        echo "文件可写<br>";
    }
    
    echo "文件建立时间：".date("Y 年 m 月 j 日",  filectime($fileName))."<br>";
    echo "文件最后更动时间：".date("Y 年 m 月 j 日",  filemtime($fileName))."<br>";
    echo "文件最后打开时间：".date("Y 年 m 月 j 日",  fileatime($fileName))."<br>";
}

function getFileType($fileName){
    switch (filetype($fileName)){
        case 'file':
            $type .= "普通文件";
            break;
        case 'dir':
            $type .= "目录文件";
            break;
        case 'block':
            $type .= "块设备文件";
            break;
        case 'char':
            $type .= "字符设备文件";
            break;
        case 'fifo':
            $type .= "命名管道文件";
            break;
        case 'link':
            $type .= "字符链接";
            break;
        case 'unknown':
            $type .= "没有检测到类型";
            break;
    }
    return $type;
}

function getFileSize($bytes){
    if($bytes >= pow(2, 40)){
        $return = round($bytes / pow (1024, 4), 2);
        $suffix = "TB";
    } elseif($bytes >= pow(2, 30)){
        $return = round($bytes / pow (1024, 3), 2);
        $suffix = "GB";
    } elseif($bytes >= pow(2, 20)){
        $return = round($bytes / pow (1024, 2), 2);
        $suffix = "MB";
    } elseif($bytes >= pow(2, 10)){
        $return = round($bytes / pow (1024, 1), 2);
        $suffix = "KB";
    } else {
        $return = $bytes;
        $suffix = "Bytes";
    }
    return $return." ".$suffix;
}
getFilePro("linuxFileType.php");

$filePro = stat("linuxFileType.php");
print_r("<pre>");
print_r(array_slice($filePro, 13));
print_r($filePro);
?>