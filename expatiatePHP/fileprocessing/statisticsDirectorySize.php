<?php

/*
 * 文件名： statisticsDirectorySize.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

function dirSize($directory){
    $dir_size = 0;
    if($dir_handle=@opendir($directory)){
        while ($filename = readdir($dir_handle)){
            if($filename != "." && $filename !=".."){
                $subFile = $directory."/".$filename;
                if(is_dir($subFile)){
                    $dir_size += dirSize($subFile);
                }
                if(is_file($subFile)){
                    $dir_size += filesize($subFile);
                }
            }
        }
        closedir($dir_handle);
        return $dir_size;
    }
}
$dir_size = dirSize("../../expatiatephp");
echo round($dir_size/pow(1024, 1), 2)."KB";
?>

