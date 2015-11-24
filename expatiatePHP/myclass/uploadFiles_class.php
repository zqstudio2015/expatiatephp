<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of uploadFiles_class
 *
 * @author BetterFeng
 */
abstract class uploadFiles {
    protected $filePath;//服务器保存路基
    protected $fileField;//$_FILE["file"]的文件属性
//    protected $maxSize=10737418240;


    public function fileUploaded($filefield);
    
    public function uploadErrorMsg();
}
