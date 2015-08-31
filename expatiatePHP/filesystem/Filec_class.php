<?php

/*
 * 文件名： Filec_class.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

/**
 * Description of Filec_class
 *
 * @author Better
 */
class Filec extends FileDir {
    /*
     * 构造方法，创建文件对象时，初始化文件成员属性
     * 参数filename：需要提供一个文件名称
     */
    function __construct($filename) {
        if (!file_exists($filename)) {
            touch($filename) or die("文件<b>" . $filename . "</b>创建失败！");
        }
        $this->name = $filename;
        $this->type = getMIMEType(pathinfo($filename));
        $this->size = toSize(filesize($filename));
        parent::__construct($filename);
    }

    /* 实现父类中的抽象方法，重写删除文件的方法体
     * 如果文件删除成功返回TRUE，失败则返回FALSE
     */
    public function delFile() {
        if (unlink($this->name)) {
            return true;
        } else {
            return false;
        }
    }

    /* 实现父类中的抽象方法，重写复制文件的方法体
     * 如果文件复制成功返回TRUE，失败则返回FALSE
     */
    public function copyFile($dFile) {
        if (copy($this->name, $dFile)) {
            return true;
        } else {
            return false;
        }
    }
    
    /*向客户端发送头文件和输出文件体内容，实现文件下载*/
    public function download(){
        header('Content-Type:'.$this->type);
        header('Content-Disposition:attachment;filename="'.$this->basename.'"');
        heaser('Content-Length:'.filesize($this->name));
        readfile($this->name);
    }

    /*可以在对象外部调用该函数，用来向文件中的写入文本内容
     * 参数text：写入文件的文本内容字符串
     */
    public function setText($text){
        $fp = fopen($this->name, "w");
        if(flock($fp, LOCK_EX)){
            fwrite($fp, $text);
            flock($fp, LOCK_UN);
        } else {
            echo '不能锁定文件';
        }
        fclose($fp);
    }
    
    /*只能在对象内部调用为成员属性type赋值，获取一些文件的常用MIME类型
     * 参数path：通过pathinfo()函数获取的文件信息数组
     */
    private function getMIMEType($path){
        $fileMimeType = "unkown";
        switch($path["wxtension"]){
            case "html":
            case "htm":
                $fileMimeType = "text/html";
                break;
            case "txt":
            case "log":
            case "php":
            case "phtml":
                $fileMimeType = "text/plain";
                break;
            case "css":
                $fileMimeType = "text/css";
                break;
            case "xml":
            case "xsl":
                $fileMimeType = "text/xml";
                break;
            case "js":
                $fileMimeType = "text/javascript";
                break;
            case "gif":
                $fileMimeType = "text/gif";
                break;
            case "jpeg":
            case "jpg":
                $fileMimeType = "text/jpeg";
                break;
            case "png":
                $fileMimeType = "text/png";
                break;
            case "pdf":
                $fileMimeType = "text/pdf";
                break;
            case "doc":
            case "dot":
                $fileMimeType = "text/msword";
                break;
            case "zip":
                $fileMimeType = "text/zip";
                break;
            case "rar":
                $fileMimeType = "text/rar";
                break;
            case "swf":
                $fileMimeType = "text/x-shockwave-flash";
                break;
            case "bin":
            case "exe":
            case "com":
            case "dll":
            case "class":
                $fileMimeType = "text/octet-stream";
                break;
        }
        return $fileMimeType;
    }
}
