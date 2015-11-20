<?php

/*
 * 文件名： FileAction_class.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

/**
 * Description of FileAction_class
 * 在该类中声明了对文件系统操作时，所触发的事件处理有关的属性和方法
 * @author Better
 */
class FileAction {

    private $file;
    private $action;

    /* 构造方法，在创建目录对象时，初始化目录成员属性
     * 参数filename：需要提供一个文件名称
     * 参数action：需要提供用户操作文件系统的活动字符串
     */

    function __construct($filename = "", $action = "") {
        if (!empty($filename)) {
            if (is_dir($filename)) {
                $this->file = new Dirc($filename);
            }
            if (is_file($filename)) {
                $this->file = new Filec($filename);
            }
        }
        if (!empty($action)) {
            $this->action = $action;
        }
    }

    /* 通过调用该方法获取用户操作表单界面
     * 参数 submitPage：提供用户操作表单时提交的位置
     */

    function getForm($submitPage) {
        echo '<form action="' . $submitPage . '"method="post" enctype="multipart/form-data">';
        if (isset($_GET["filename"])) {
            echo '<input type="hidden" name = "filename" value = "' . $this->file->getName() . '">';
        }
        if (isset($_GET["dirname"])) {
            echo '<input type = "hidden" name = "dirname" value = "' . $_GET["dirname"] . '">';
        }
        switch ($this->action) {
            case "copy":
                echo '<input type="hidden" name="action" value="copy">';
                echo '将文件<b>' . $this->file->getName() . '</b>复制到';
                echo '<input type="text" name="tofile">';
                echo '<input type="submit" value="复制">';
                break;
            case "rename":
                echo '<input type="hidden" name="action" value="raname">';
                echo '将文件<b>' . $this->file->getName() . '</b>移动/重命名为';
                echo '<input type="text" name="tofile">';
                echo '<input type="submit" value="移动/重命名">';
                break;
            case "delete":
                echo '<input type="hidden" name="action" value="delete">';
                echo '将文件<b>' . $this->file->getName() . '</b>删除';
                echo '<input type="submit" value="删除">';
                echo '<a href="' . $submitPage . '">取消</a>';
                break;
            case "edit":
                echo '<input type="hidden" name="action" value = "edit">';
                echo '<center><h3>编辑' . $this->file->getName() . '</h3>';
                echo '<textarea rows="25" cols="100" name="content">';
                echo $this->file->getText();
                echo '</textarea></br>';
                echo '<input type="submit" value="修改文件">';
                echo '<input type="reset" value="重置">';
                echo '<a href="' . $submitPage . '"取消</a></center>';
                break;
            case "addfile":
                echo '<input type="hidden" name="action" value = "addfile">';
                echo '<center>文件名:<input type="text" size=30 name="filename">';
                echo '<br><textarea rows="25" cols="100" name="content">';
                echo '</textarea></br>';
                echo '<input type="submit" value="创建文件">';
                echo '<input type="reset" value="重置">';
                echo '<a href="' . $submitPage . '"取消</a></center>';
                break;
            case "adddir":
                echo '<input type="hidden" name="action" value="adddir">';
                echo '目录名：<input type="text" size="30" name="newdirname">';
                echo '<input type="submit" value="创建目录">';
                echo '<a href="' . $submitPage . '">取消</a>';
                break;
            case "upload":
                echo '<input type="hidden" name="action" value="upload">';
                echo '上传文件：<input type="file" name="upfile">';
                echo '<input type="submit" value="上传">';
                echo '<a href= "' . $submitPage . '">取消</a>';
                break;
        }
        echo '</form>';
    }

    /* 通过调用该方法对用户的活动进行处理
     * 
     */

    function option() {
        switch ($this->action) {
            case "copy":
                if (isset($_POST["tofile"]) && !empty($_POST["tofile"])) {
                    if ($_POST["dirname"]) {
                        $toFile = $_POST["dirname"] . '/' . $_POST["tofile"];
                    } else {
                        $toFile = $_POST["tofile"];
                    }
                    $this->file->copyFile($toFile) or die("文件复制失败！");
                }
                break;
            case "rename":
                if (isset($_POST["tofile"]) && !empty($_POST["tofile"])) {
                    if ($_POST["dirname"]) {
                        $toFile = $_POST["dirname"] . '/' . $_POST["tofile"];
                    } else {
                        $toFile = $_POST["tofile"];
                    }
                    $this->file->copyFile($toFile) or die("文件移动失败！");
                }
                break;
            case "delete":
//                $this->file->delFile() or die("文件删除失败");
                if (is_dir($_POST["filename"])) {
                    rmdir($_POST["filename"]) or die("文件删除失败");
                }
                if (is_file($_POST["filename"])) {
                    unlink($_POST["filename"]) or die("文件删除失败");
                }

                break;
            case "edit":
                $this->file->setText($_POST["content"]);
                break;
            case "addfile":
                $newfilename = $_POST["dirname"] . '/' . $_POST["filename"];
                if (file_exists($newfilename)) {
                    echo '文件' . $newfilename . '已经存在！';
                } else {
                    $newfile = new Filec($newfilename);
                    $newfile->setText($_POST["content"]);
                }
                break;
            case "adddir":
                $newfilename = $_POST["dirname"] . '/' . $_POST["newdirname"];
                if (file_exists($newfilename)) {
                    echo '目录' . $newfilename . '已经存在！';
                } else {
                    $newdir = new Dirc($newfilename);
                }
                break;
            case "upload":
                $tmp = new FileUpload(array('filePath' => $_POST["dirname"]));
                $res = $tmp->uploadFile($_FILES["upfile"]);
                if ($res < 0) {
                    echo $tmp->getErrorMsg() . '<br>';
                    exit;
                }
                break;
        }
    }

    /* 通过调用该方法获取所操作的对象属性信息
     * 
     */

    function getFileInfo() {
        if (empty($this->file)) {
            echo '<center><h1>创建新的文件或目录</h1></center>';
        } else {
            echo '<center><h1>文件或目录操作</h1></center>';
            echo $this->file;
        }
    }

}
