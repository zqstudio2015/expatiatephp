<?php

/*
 * 文件名： Dirc_class.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

/**
 * Description of Dirc_class
 * 是目录类，继承FileDir类，扩展了一些和目录相关处理的成员方法
 * @author Better
 */
class Dirc extends FileDir {
    /* 构造方法，在创建目录对象时，初始化目录成员属性
     * 参数filename：需要提供一个目录名称
     */
    function __construct($dirname = ".") {
        if(!file_exists($dirname)){
            mkdir($dirname) or die("目录<b>".$dirname."</b>创建失败！");
        }
        $this->name = $dirname;
        $this->type = "directory/";
        $this->size = $this->toSize($this->dirSize($dirname));
        parent::__construct($dirname);
    }
    
    /*实现父类中的抽象方法，重写删除文件的方法体
     * 如果目录删除成功返回True，失败则返回False
     */
    public function copyFile($dFile) {
        $this->copyFile($this->name, $dFile);
        if(file_exists($dFile)){
            return true;
        } else {
            return false;
        }
    }

    /*实现父类中的抽象方法，重写删除文件的方法体
     * 如果目录删除成功返回True，失败则返回False
     */
    public function delFile() {
        $this->delDir($this->name);
        if(!file_exists($this->name)){
            return true;
        } else {
            return false;
        }
    }

    /*递归获取目录占用大小，目录中所有文件大小遍历累加在一起，即目录大小
     * 参数directory：提供需要获取大小的目录
     * 返回值dir_size：将计算后的文件大小返回
     */
    private function dirSize($directory){
        $dir_size = 0;
        if($dir_handle = opendir($directory)){
            while($filename = @readdir($dir_handle)){
                if($filename != "." && $filename != ".."){
                    $subFile = $directory."/".$filename;
                    if(is_dir($subFile)){
                        $dir_size += $this->dirSize($subFile);
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
    
    /*递归删除目录中的文件，在删除空目录
     * 参数directory：提供要被删除的目录
     */
    private function delDir($dectory){
        if(file_exists($dectory)){
            if($dir_handle = @opendir($directory)){
                while($filename = readdir($dir_handle)){
                    if($filename != "." && $filename != ".."){
                        $subFile = $directory."/".$filename;
                        if(is_dir($subFile)){
                            $this->delDir($subFile);
                        }
                        if(is_file($subFile)){
                            unlink($subFile);
                        }
                    }
                }
                closedir($dir_handle);
                rmdir($directory);
            }
        }
    }
    
    /*递归复制目录以及目录下的文件到新的位置
     * 参数dirSrc：提供要被复制的源目录
     * 参数dirTo：提供要被复制目录的目标位置
     */
    private function copyDir($dirSrc,$dirTo){
        if(is_file($dirTo)){
            echo "目标不是目录不能创建！！";
            return;
        }
        if(!file_exists($dirTo)){
            mkdir($dirTo);
        }
        if($dir_handle = @opendir($dirSrc)){
            while ($filename = readdir($dir_handle)){
                if($filename !="." && $filename != ".."){
                    $subSrcFile = $dirSrc ."/".$filename;
                    $subToFile = $dirTo."/".$filename;
                    if(is_dir($subSrcFile)){
                        $this->copyDir($subSrcFile, $subToFile);
                    }
                    if(is_file($subSrcFile)){
                        copy($subSrcFile, $subToFile);
                    }
                }
            }
            closedir($dir_handle);
        }
    }
    
}

