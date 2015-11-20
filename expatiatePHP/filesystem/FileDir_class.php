<?php

/*
 * 文件名： FileDir_class.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

/**
 * Description of FileDir_class
 *
 * @author Better
 */
abstract class FileDir {

    protected $name;
    protected $basename;
    protected $type;
    protected $size;
    protected $ctime;
    protected $mtime;
    protected $atime;
    protected $able;

    /* 构造方法，在创建子类对象时，在子类的构造方法中调用该法初始化成员属性
     * 参数filename：提供一个文件或目录名称
     */
    function __construct($filename) {
        $this->basename = basename($filename);
        $this->ctime = $this->getDateTime($filename, 'c');
        $this->mtime = $this->getDateTime($filename, 'm');
        $this->atime = $this->getDateTime($filename, 'a');
        $this->able = $this->fileAble($filename);
    }

    /*调用时返回对象中的成员属性name的值，用来获取文件名称
     * 
     */
    public function getName() {
        return $this->name;
    }

    /* 调用时返回对象中的成员属性basename的值，用来获取稳健的基名称的成员属性basename的值
     * 
     */
    public function getBaseName() {
       return $this->basename; 
    }
    
    /* 调用时返回对象中的成员属性size的值，用来获取文件的占用的磁盘空间大小 */
    public function getSize(){
        return $this->size;
    }
    
    /* 调用时返回对象中的成员属性type的值，用来获取文件的类型 */
    public function getType(){
        return $this->type;
        
    }
    
    /* 调用时返回对象中的成员属性able的值，用来获取文件的访问权限 */
    public function getAble(){
        return $this->able;
    }
    
    /* 调用时返回对象中的成员属性ctime的值，用来获取文件的创建时间 */
    public function getCtime(){
        return $this->ctime;
    }
    
    /* 调用时返回对象中的成员属性mtime的值，用来获取文件的修改时间 */
    public function getMtime(){
        return $this->mtime;
    }
    
    /* 调用时返回对象中的成员属性atime的值，用来获取文件的访问时间 */
    public function getAtime(){
        return $this->atime;
    }
    
    /* 声明一个删除文件的抽象方法，在子类中实现 */
    abstract protected function delFile();
    
    /* 声明一个复制文件的抽象方法，在子类中实现 */
    abstract protected function copyFile($dFile);
    
    /*声明移动文件或为文件重命名的方法
     * 参数newName:提供一个文件或目录新名称
     * 返回值：如果成功返回TRUE，如果失败则返回FALSE
     */
    public function moveeFile($newName){
        if(rename($this->name,$newName)){
            $this->name = $newName;
            return true;
        } else {
            return false;
        }
    }
    
    /* 将获取的文件字节数，转换为合适的单位（TB、GB、MB、KB）
     * 参数bytes：提供一个文件占用磁盘的字节数大小
     * 返回值：合适的单位
     */
    protected function toSize($bytes){
        if($bytes >= pow(2, 40)){
            $returnSize = round($bytes / pow(2, 40),2);
            $suffix = "TB";
        } elseif($bytes >= pow(2, 30)){
            $returnSize = round($bytes / pow(2, 30),2);
            $suffix = "GB";
        } elseif($bytes >= pow(2, 20)){
            $returnSize = round($bytes / pow(2, 20),2);
            $suffix = "MB";
        } elseif($bytes >= pow(2, 10)){
            $returnSize = round($bytes / pow(2, 10),2);
            $suffix = "KB";
        } else{
            $returnSize = $bytes;
            $suffix = "Bytes";
        }
        return $returnSize." ".$suffix;
    }
    
    /* 获取文件的时间属性，为三个存储时间的成员属性赋初值
     * 参数filename：提供一个文件名，从该文件中获取时间属性
     * 参数cate：提供一个用于选择不同类型时间的符号（m、c、a）
     * 返回值：文件符合条件并转换格式厚的时间字符串
     */
    protected function getDateTime($filename, $cate='m'){
        date_default_timezone_set("Etc/GMT-8");
        switch ($cate){
            case 'm':
                return date("Y-m-j H:i:s", filemtime($filename));
                break;
            case 'c':
                return date("Y-m-j H:i:s", filemtime($filename));
                break;
            case 'a':
                return date("Y-m-j H:i:s", filemtime($filename));
                break;
            default :
                return "0000-00-00 00:00:00";
        }
    }
    
    /* 获取文件的访问权限，为成员属性able赋初值，使用8禁止的整数格式代表
     * 返回值：权限值4 可读；2 可写；1 可执行；7 为4+2+1表示可读可写可执行；0 没有权限
     */
    protected function fileAble(){
        $read = 0;
        $write = 0;
        $exe = 0;
        if(is_readable($this->name)){
            $read = 4;
        }
        if(is_writable($this->name)){
            $write = 2;
        }
        if(is_executable($this->name)){
            $exe = 1;
        }
        
        return $read + $write + $exe;
    }
    
    /*声明一个魔术方法，在直接输出对象时，将对象中所有属性形成字符串返回
     * 
     */
    function __toString() {
        $fileContent = "";
        $fileContent .= "文件名称：".$this->getName()."<br>";
        $fileContent .= "文件类型：".$this->getType()."<br>";
        $fileContent .= "文件大小：".$this->getSize()."<br>";
        $fileContent .= "文件访问权限：".$this->fileAble()."<br>";
        $fileContent .= "文件创建时间：".$this->getCtime()."<br>";
        $fileContent .= "文件修改时间：".$this->getMtime()."<br>";
        $fileContent .= "文件访问时间：".$this->getAble()."<br>";
        return $fileContent;
    }
}
