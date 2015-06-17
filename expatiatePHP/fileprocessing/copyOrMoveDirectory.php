<?php

/*
 * 文件名： copyOrMoveDirectory.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

function copyDir($dirSrc, $dirTo){
    if(is_file($dirTo)){
        echo "目标不是目录不能创建！！";
        return;
    }
    if(!file_exists($dirTo)){
        mkdir($dirTo);
    }
    if($dir_handle=@opendir($dirSrc)){
        while ($filename = readdir($dir_handle)){
            if($filename != "." && $filename != ".."){
                $subSrcFile = $dirSrc."/".$filename;
                $subToFile = $dirTo."/".$filename;
                if(is_dir($subSrcFile)){
                    copyDir($subSrcFile, $subToFile);
                }
                if(is_file($subSrcFile)){
                    copy($subSrcFile, $subToFile);
                }
            }
        }
        closedir($dir_handle);
    }
}
copyDir("delfolder", "copyfolder")
?>

