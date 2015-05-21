<?php

/*
 * 文件名： class_rect.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

/**
 * Description of rect
 *
 * @author Better
 */
class rect implements shape {
    private $width;
    private $height;
    
    function __construct($sides="") {
        $this->width = $sides["width"];
        $this->height = $sides["height"];
    }
    
    function area() {
        return $this->width * $this->height;
    }
    
    function perimeter() {
        return 2 * ($this->width + $this->height);
    }
}
