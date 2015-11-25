<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of uploadFilesMulti2_class
 *
 * @author BetterFeng
 */ 
        
//if (isset($_POST["action"])) {    
//            $fileaction = new uploadFilesMulti2($_POST["dirname"]);
//            exit(json_encode($fileaction->uploadFile($_FILES["upfile"])));    
//        }

        
class uploadFilesMulti2 {
    private $filePath;
    private $fileField;
    private $allowFileType = array('image/jpeg', 'image/png');
    private $maxSize = 835941;
    private $errorNumArray = array();
    
    function __construct($filePath = "/home/wwwroot/default/expatiatephp/filesystem/updates/"){
        $this->filePath = $filePath;
    }
    
    public function uploadFile($fileField = array()){   
        array_walk($fileField['size'], "uploadFilesMulti2::checkFileType");//类中调用回调函数方法1
        array_walk($fileField['size'], array("uploadFilesMulti2", "checkFileSize"));//类中调用回调函数方法2
        return $this->errorNumArray;
    }
    
    private function checkFileSize($value, $key){
        if($value > $this->maxSize){
            $this->errorNumArray[$key] = -3;
        } else {
            $this->errorNumArray[$key] = 0;
        }        
    }
    
    private function checkFileType($value, $key){
        if(in_array($value, $this->allowFileType)){
            $this->errorNumArray[$key] = 0;
        } else {
            $this->errorNumArray[$key] = -2;
        }
    }
}
?>
