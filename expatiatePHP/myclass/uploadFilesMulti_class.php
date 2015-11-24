<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of uploadFilesMulti_class
 *
 * @author BetterFeng
 */
class uploadFilesMulti extends uploadFiles {

    private $errorNum = 0; //错误标号
    private $allowType = array("image\/jpeg", "image\/jpeg"); //允许上传文件类型;
    private $maxSize = 10737418240; //服务器允许上传文件最大值
    private $fileCount;
    private $errorNumArray = array();

    /* 构造方法
     * 参数$filePath为服务存放路径
     */

    function __construct($filePath) {
        $this->filePath = $filePath;
    }

    /* 在对象外部调用该处理方法上传文件
     * 参数filefield：提供全局变量数组$_FILES是的第二维数组
     * 返回值：如果文件上传成功返回TRUE，如果失败则返回FALSE
     */

    function fileUploaded($filefield) {
        if ($this->checkFilePath()) {
            if (isset($filefield["name"])) {
                if (is_array($filefield["name"])) {
                    $this->fileCount = count($filefield["name"]);
                    $this->fileField = $this->getFileFieldArray($filefield);
                }
                while ($num < $this->fileCount) {
                    $num ++;
                    $this->copyFile($num);
                }
            }
            return TRUE;
        } else {
            return FALSE;
        }        
    }

    /* 初始化文件对象数组fileField属性
     * 参数fileField,为$_FILE的二维数组
     */

    private function getFileFieldArray($filefield) {
        $fileFieldArray = array();
        for ($i = 0; $i < $this->fileCount; $i++) {
//            $arrayFileField[$filefield["name"][$i]] = array_combine(array_keys($filefield), array($filefield["name"][$i], $filefield["type"][$i], $filefield["tmp_name"][$i], $filefield["error"][$i], $filefield["size"][$i]));
            array_push($fileFieldArray, array_combine(array_keys($filefield), array($filefield["name"][$i], $filefield["type"][$i], $filefield["tmp_name"][$i], $filefield["error"][$i], $filefield["size"][$i])));
            $this->arrayAddKey($fileFieldArray, $i, "newFileName", $this->proRandName($filefield["name"][$i]));
        }
        return $fileFieldArray;
    }

    /* 增加数组元素
     * 参数originArray,为需要增加元素的数组;参数dimension,需要增加元素的维度;参数key增加的键值;参数param增加的值
     */

    private function arrayAddKey(&$originArray, $dimension, $key, $param) {
        $originArray[$dimension][$key] = $param;
    }

    /* 随机产生上传文件的新文件名称
     * 
     */

    private function proRandName($originName) {
        $pos = strpos($originName, '.');
        $fileName = substr($originName, 0, $pos);
        $extensionName = substr($originName, $pos);
        return $fileName . date("YmdHis") . $extensionName;
    }

    /* 检查文件路径是否存在
     * 
     */

    private function checkFilePath() {
        if (!file_exists($this->filePath)) {
            return $this->makePath();
        } else {
            return FALSE;
        }
    }

    /* 保存上传文件的路径
     * 
     */

    private function makePath() {
        if (!@mkdir($this->filePath, 0755)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /* 检查上传文件类型是否为允许的类型
     * 
     */

    private function checkFileType($element) {
        if (!in_array($this->fileField[$element]["type"], $this->allowType)) {
            $this->fileField[$element]["errorNum"] = -2;
            $this->setErrorNumArray($element, -2);
        }
        return $this->errorNumArray;
    }

    /* 将上传文件从临时目录中赋值到指定的新位置
     * 
     */

    private function copyFile($element) {
        $filePath = $this->filePath;
        if ($filePath[strlen($filePath) - 1] != '/') {
            $filePath .= '/';
        }

        $filePath .= $this->fileField[$element]["newFileName"];
        if (!@move_uploaded_file($this->fileField[$element][$this->fileField[$element]], $filePath)) {
            $this->setErrorNumArray($element, -5);
        }
        return $this->errorNumArray;
    }

    /* 设置各个文件错误信息
     * 
     */

    private function setErrorNumArray($element, $errorNum) {
        $this->errorNumArray[$element] = $errorNum;
    }

    /* 根据错误标号返回对应的错误信息
     * 
     */

    public function getErrorMsg() {
        $str = "";
        for ($i = 0; $i < $this->fileCount; $i++) {
            $errorNum = $this->errorNumArray[$i];
            $str .= $this->fileField[$i]["name"] . ' ' . $this->errorMsg($errorNum) . '<br>';
        }
        return $str;
    }

    private function errorMsg($errorNum) {
        $str = "上传文件信息：";
        switch ($errorNum) {
            case 0:
                $str .="文件上传成功";
                break;
            case -1:
                $str .= "未知错误";
                break;
            case -2:
                $str .= "未允许类型";
                break;
            case -3:
                $str .= "文件过大";
                break;
            case -4:
                $str .= "产生文件名出错";
                break;
            case -5:
                $str .= "上传失败";
                break;
            case -6:
                $str .= "目录不存在";
                break;
            case -7:
                $str .= "建立目录失败";
                break;
        }
        return $str;
    }

}
