<?php

/*
 * 文件名： CreateImage.class
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

class CreateImage {

    private $image;
    private $width;
    private $height;
    private $checkCode;

    function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
        $this->checkCode = $this->createCheckCode();        
    }

    private function createImage() {
        $this->image = imagecreate($this->width, $this->height);
        $white = imagecolorallocate($this->image, 0xFF, 0xFF, 0xFF);
        $border = imagecolorallocate($this->image, 0x90, 0x90, 0x90);
        imagerectangle($this->image, 1, 1, $this->width - 1, $this->height - 1, $border);
    }

    function showImage() {        
        $this->createImage();

        header('Content-type: image/png');
        imagepng($this->image);
    }

    private function outputText() {
        for ($i = 0; $i < 4; $i++) {
            
            $red = imagecolorallocate($this->image, rand(0, 255), rand(0, 255), rand(0, 255));
            $charx = floor($this->width / 40) * $i + 5;
            imagechar($this->image, 6, $charx, 5, $this->checkCode[$i], $red);
        }
    }

    private function createCheckCode() {
        $ascii_number="";
        for ($i = 0; $i < 4; $i++) {
            $number = rand(0, 2);
            switch ($number) {
                case 0:
                    $rand_number = rand(48, 57);
                    break;
                case 1:
                    $rand_number = rand(65, 90);
                    break;
                case 2:
                    $rand_number = rand(97, 122);
                    break;
            }
            $ascii = sprintf("%c", $rand_number);
            $ascii_number = $ascii_number.$ascii;
        }
        return $ascii_number;
    }

    function __destruct() {
        imagedestroy($this->image);
    }

}
