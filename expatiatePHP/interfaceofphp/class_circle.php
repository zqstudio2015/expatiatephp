<?php

/*
 * 文件名： class_circle.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

/**
 * Description of class_circle
 *
 * @author Better
 */
class circle implements shape {
    private  $radius;
    
    function __construct($sides = "") {
        $this->radius = $sides["radius"];
    }
    
    function area() {
        return pi()*$this->radius*$this->radius;
    }
    
    function perimeter() {
        return 2*pi()*$this->radius;
    }
}
