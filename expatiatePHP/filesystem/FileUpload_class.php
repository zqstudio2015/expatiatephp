<?php

/*
 * 文件名： FileUpload_class.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

/**
 * Description of FileUpload_class
 * 将与文件上传的成员属性和成员方法声明在一起
 * @author Better
 */
class FileUpload {

    private $filePath;
    private $fileField;
    private $originName;
    private $tmpFileName;
    private $fileType;
    private $fileSize;
    private $newFileName;
    private $allowType = array('txt', 'html', 'php', 'js', 'css', 'jpg', 'gif', 'png', 'doc', 'swf', 'rar', 'zip');
    private $maxSize = 1000000000;
    private $isUserDefName = false;
    private $userDefName;
    private $isRandName = false;
    private $randName;
    private $errorName = 0;
    private $isConverModer = true;

    /* 构造方法，创建上传文件对象时为部分成员属性列表赋初值
     * 参数options：提供一个数组，数组下表为成员属性名称，元素值为属性设置的值
     */
    function __construct($options = array()) {
        $this->setOptions($options);
    }
    
    /*在对象外部调用该处理方法上传文件
     * 参数filefield：提供全局变量数组$_FILES是的第二维数组
     * 返回值：如果文件上传成功返回TRUE，如果失败则返回FALSE
     */
    function uploadFile($filefield){
        $this->setOption('errorNum', 0);
        $this->setOption('fileField', $filefield);
        $this->setFiles();
        $this->checkValid();
        $this->checkFilePath();
        $this->setNewFileName();
        if($this->errorNum < 0){
            return $this->errorNum;
        }
        return $this->copyFile();
    }
    
    /*为成员属性列表赋初值
     * 参数options：提供一个数组，数组下表为成员属性名称，元素值即为属性设置的值
     */
    private function setOptions($options = array()){
        foreach ($options as $key => $val){
            if(!in_array($key, array('filePathi', 'fileField', 'originName', 'allowType', 'maxSize', 'isUserDefName', 'userDefName', 'isRandName', 'randName'))){
                continue;
            }
            $this->setOption($key, $val);
        }
    }
    
    /*从$_fILES数组中取值，付给对应的成员属性
     * 
     */
    private function setFiles(){
        if($this->getFileErrorFormFILES() != 0){
            $this->setOption('errorNum', -1);
            return $this->errorNum;
        }
        $this->setOption('originName', $this->getFileNameFormFILES());
        $this->setOption('tmpFileName', $this->getFileNameFormFILES());
        $this->setOption('fileType', $this->getFileNameFormFILES());
        $this->setOption('fileSize', $this->getFileNameFormFILES());
    }
    
    /*未指定的成员属性赋值
     * 参数key：提供保存成员属性名的变量
     * 参数val：提供将要为成员属性赋的值
     */
    private function setOption($key, $val){
        $this->$key = $val;
    }
    
    /*为上传文件设置新的文件名称
     * 
     */
    private function setNewFileName(){
        if($this->isRandName == false && $this->isUserDefName == false){
            $this->setOption('newFileName', $this->originName);
        } else if($this->isRandName == true && $this->isUserDefName == false){
            $this->setOption('newFileName', $this->proRandName().'.'.$this->fileType);
        } else if($this->isRandName == true && $this->isUserDefName == false){
            $this->setOption('newFileName', $this->userDefName);
        } else {
            $this->setOption('errorNum', -4);
        }
    }
    
    /*检查上传是否有效
     * 
     */
    private function checkValid(){
        $this->checkFileSize();
        $this->checkFileType();
    }
    
    /*检查上传文件类型是否为允许的类型
     * 
     */
    private function checkFileType(){
        if(!in_array($this->fileType, $this->allowType)){
            $this->setOption('errorNum', -2);
        }
        return $this->errorNum;
    }
    
    /*检查上传文件大小是否超出范围
     * 
     */
    private function checkFileSize(){        
         if(in_array($this->fileSize, $this->maxSize)){
            $this->setOption('errorNum', -3);
        }
        return $this->errorNum;
    }
    
    /*检查上传文件大小是否超出范围
     * 
     */
    private function checkFilePath(){
         if(!file_exists($this->filePath)){
             if($this->isConverModer){
                 $this->makePath();
             } else {
                 $this->setOption('errorNum', -6);
             }
        }
    }
    
    /*随机产生上传文件的新文件名称
     * 
     */
    private function proRandName(){
        $tmpStr = "abcdefghijklmnopqrstuvwxyz012345679";
        $str = "";
    for($i = 0; $i < 8; $i++){
        $num = rand(0, strlen($tmpStr));
        $str .=$tmpStr[$num];
    }
    return $str;
    }
    
    /*保存上传文件的路径
     * 
     */
    private function makePath(){
        if(!@mkdir($this->filePath, 0755)){
            $this->setOPtion('errorNum', -7);
        }
    }
    
    /*将上传文件从淋湿目录中赋值到指定的新位置
     * 
     */
    private function copyFile(){
        $filePath = $this->filePath;
        if($filePath[strlen($filePath)-l] != '/'){
            $filePath .= '/';
        }
        
        $filePath .= $this->newFileName;
        if(!@move_uploaded_file($this->tmpFileName, $filePath)){
            $this->setOption('errorNum', -5);
        }
        return $this->errorNum;
    }
    
    /*从全局变量数组$_FILES中获取上传文件的错误标号
     * 
     */
    private function getFileErrorFormFILES(){
        return $this->fileField['error'];
    }
    
    /*获取文件的后缀名
     * 
     */
    private function getFileTypeFromFILES(){
        $str = $this->fileField['name'];
        $aryStr = split("\.", $str);
        $ret = strtolower($aryStr[count($aryStr) - 1]);
        return $ret;
    }
    
    /*从全局变量数组$_FILES中获取上传文件的文件名
     * 
     */
    private function getFileNameFormFILES(){
        return $this->fileField['name'];
    }
    
    /*从全局变量数组$_FILES中获取上传文件的临时文件名
     * 
     */
    private function getTmpFileNameFromFILES(){
        return $this->fileField['tmp_name'];
    }
    
    /*从全局变量数组$_FILES中获取上传文件的大小
     * 
     */
    private function getFileSizeFromFILES(){
        return $this->fileField['size'];
    }
    
    /*根据错误标号返回对应的错误信息
     * 
     */
    public function getErrorMsg(){
        $str = "上传文件出错：";
        switch($this->errorNum){
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
