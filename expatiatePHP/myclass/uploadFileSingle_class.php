<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of uploadFileSingle_class
 *
 * @author BetterFeng
 */
class uploadFileSingle extends uploadFiles {
    
    private $originName;//上传前文件名
    private $newFileName;//上传后文件名
    private $tmpFileName;//文件临时目录
    private $fileType;//文件类型
    private $fileSize;//文件大小
    private $errorNum = 0;//错误标号
    private $allowType = array("image\/jpeg", "image\/jpeg");//允许上传文件类型;
    private $maxSize = 10737418240;//服务器允许上传文件最大值
    
    /*构造方法
     * 参数$filePath为服务存放路径
     */
    function __construct($filePath) {
        $this->filePath = $filePath;
    }
    
    /*在对象外部调用该处理方法上传文件
     * 参数filefield：提供全局变量数组$_FILES是的第二维数组
     * 返回值：如果文件上传成功返回TRUE，如果失败则返回FALSE
     */
    function fileUploaded($filefield){
        $this->setOption('errorNum', 0);
        $this->setOption('fileField', $filefield);
        $this->setOption('originName', $this->getFileNameFormFILES());
        $this->setOption('tmpFileName', $this->getTmpFileNameFromFILES());
        $this->setOption('fileType', $this->getFileTypeFromFILES());
        $this->setOption('fileSize', $this->getFileSizeFromFILES());
        $this->checkValid();
        $this->checkFilePath();
        $this->setNewFileName();
        if($this->errorNum < 0){
            return $this->errorNum;
        }
        return $this->copyFile();
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
        $this->setOption("newFileName",proRandName());
    }
    
    /*随机产生上传文件的新文件名称
     * 
     */
    private function proRandName(){
        return $this->originName . date("Ymdhis");
    }
    
    /*将上传文件从淋湿目录中赋值到指定的新位置
     * 
     */
    private function copyFile(){
        $filePath = $this->filePath;
        if($filePath[strlen($filePath)-1] != '/'){
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
         if($this->fileSize > $this->maxSize){
            $this->setOption('errorNum', -3);
        }
        return $this->errorNum;
    }
    
    /*获取文件的后缀名
     * 
     */
    private function getFileTypeFromFILES(){
        return $this->fileField["type"];
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
    public function uploadErrorMsg(){
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
