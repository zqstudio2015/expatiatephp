<?php

/*
 * 文件名： delfolder.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
function delDir($directory){
    if(file_exists($directory)){
        if($dir_handle=@opendir($directory)){
            while($filename = readdir($dir_handle)){
                if($filename != "." && $filename != ".."){
                    $subFile = $directory."/".$filename;
                    if(is_dir($subFile)){
                        delDir($subFile);
                    }
                    if(is_file($subFile)){
                        unlink($subFile);
                    }
                }
            }
            closedir($dir_handle);
        if(!rmdir($directory)){
            echo '删除目录失败'.$directory.'<br>';
        }
        }
    }
}
delDir("delfolder");
?>

