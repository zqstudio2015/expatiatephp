<?php

/*
 * 文件名： FileSystem_class.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

/**
 * Description of FileSystem_class
 *
 * @author Better
 */
class FileSystem {
    private $serverpath;
    private $path;
    private $pagepath;
    private $prevpath;
    private $files = array();
    private $filenum = 0;
    private $dirnum = 0;
    
    /* 构造方法，在创建文件系统对象时，初始化文件系统对象的成员属性
     * 参数 path：需要提供所操作目录的目录位置名称，默认为当前目录
     */
    function __construct($path = ".") {
        $this->serverpath = $_SERVER["DOCUMENT_ROOT"] . "/expatiatephp/filesystem";
        $this->path = $path;
        $this->prevpath = dirname($path);
        $this->pagepath = dirname($_SERVER["SCRIPT_FILENAME"]-1);
//        $this->pagepath = __FILE__;
        $dir_handle = opendir($path);
        while ($file = readdir($dir_handle)){
            if($file != "." && $file != ".."){
                $filename = $path . "/" . $file;
                if(is_dir($filename)){
                    $tmp = new Dirc($filename);
                    $this->dirnum++;
                }
                if(is_file($filename)){
                    $tmp = new Filec($filename);
                    $this->filenum++;
                }
                array_push($this->files, $tmp);
            }
        }
        closedir($dir_handle);
    }
    
    //访问该方法获取Web服务器文档根目录
    public function getServerPath(){
        return $this->serverpath;
    }
    
    //访问该方法获取当前脚本所在的目录
    public function getPagePath(){
        return $this->pagepath;
    }
    
    //访问该方法获取所操作目录的上一级目录
    public function getPrevPath(){
        return $this->prevpath;
    }
    
    //访问该方法获取所操作目录下的文件和目录对象的个数
    public function getDirInfo(){
        $str = "本目录下共有文件<b>" . ($this->dirnum + $this->filenum) . "</b>个，";
        $str .= "其中目录<b>" . $this->dirnum . "</b>个，";
        $str .= "文件<b>" . $this->filenum . "</b>个。<br>";
        return $str;
    }
    
    //访问该方法获取所操作目录所在的磁盘空间使用信息
    public function getDiskSpace(){
        $totalSpace = round(disk_total_space($this->prevpath)/pow(1024, 2), 2);
        $freeSpace = round(disk_free_space($this->prevpath)/pow(1024, 2), 2);
        $usedSpace = $totalSpace - $freeSpace;
        $str = "所在分区的总大小：<b>" . $totalSpace . "</b>MB，";
        $str .= "已用：<b>" . $usedSpace . "</b>MB，";
        $str .= "可用：<b>" . $freeSpace . "</b>MB。";
        return $str;
    }
    
    //访问该方法获取文件系统的操作菜单
    public function getMenu(){
        $menu = '<a href="contral.php?action=upload&dirname=' . $this->path . '">上传文件</a>||';
        $menu .= '<a href="contral.php?action=adddir&dirname=' . $this->path . '">新建目录</a>||';
        $menu .= '<a href="contral.php?action=addfile&dirname=' . $this->path . '">创建文件</a>||';
        $menu .= '<a href="filesystem.php?dirname=' .$this->getPrevPath() . '">上级目录</a>||';
        $menu .= '<a href="filesystem.php?dirname=' .$this->getPagePath() . '">开始目录</a>||';
        $menu .= '<a href="filesystem.php?dirname=' .$this->getServerPath() . '">文档根目录</a>';
        echo $menu;
    }
    
    //访问该方法获取文件系统所操作目录下的文件目录和目录对象立标，以表格形式输出
    public function fileList(){
        echo '<table border="0" cellspacing="1" cellpadding="1" width="100%">';
        echo '<tr bgcolor="#b0c4de">';
        echo '<th>类型</th><th>名称</th><th>大小</th><th>修改时间</th><th>操作</th>';
        echo '</tr>';
        if(is_array($this->files)){
            $trcolor = "#dddddd";
            foreach ($this->files as $file){
                if($trcolor == "#dddddd"){
                    $trcolor = "#ffffff";
                } else {
                    $trcolor = "#dddddd";
                }
                echo '<tr style="font-size:14px;" bgcolo =' . $trcolor . '>';
                echo '<td>' . $file->getType() . '</td>';
                echo '<td>' . $file->getBaseName() . '</td>';
                echo '<td>' . $file->getSize() . '</td>';
                echo '<td>' . $file->getMtime() . '</td>';
                echo '<td>' . $this->operate("contral.php", $file) . '</td>';
                echo '</tr>';
            }
        }
        echo '</table>';
    }
    
    /*访问该方法获取文件系统中单个文件或目录对象的操作选项
     * 参数 cpage：提供一个控制脚本，当用户进行某项操作时转向的处理页面
     * 参数 file：提供一个文件或目录对象
     */
    public function operate($cpage, $file){        
        list($maintype, $subtype) = explode("/", $file->getType());
        $query = 'filename=' . $file->getName() . '&dirname=' . $this->path;
        $operstr = '<a href="' . $cpage . '?action=copy&' . $query.'">复制</a>';
        $operstr .= '/<a href="' . $cpage . '?action=rename& ' . $query.'">重命名</a>';
        $operstr .= '/<a href="' . $cpage . '?action=delete&' . $query.'">删除</a>';
        switch($maintype){
            case 'dirctory':
                $operstr .= '/<a href="filesystem.php?dirname=' . $file->getName() . '">进入</a>';
                break;
            case 'text':
                $operstr .= '/<a href="' . $cpage . '?action=edit&' . $query.'">编辑</a>';
                $operstr .= '/<a href = "download.php?filename=' . $file->getName() . '">下载</a>';
                break;
            case 'image':
                $operstr .= '/<a href="' . $file->getName() . '">预览</a>';
                $operstr .= '/<a href="download.php?filename=' . $file->getName() . '">下载</a>';
                break;
            default:
                $operstr .= '/<a href="download.php?filename=' . $file->getName() . '">下载</a>';
        }
        return $operstr;
    }
}
