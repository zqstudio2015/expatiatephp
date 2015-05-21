<?php

/*
 * 文件名： class_triangle.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

/**
 * Description of class_triangle
 *
 * @author Better
 */
class triangle implements shape {

    private $side1;
    private $side2;
    private $side3;

    function __construct($sides = "") {
        $this->side1 = $sides["side1"];
        $this->side2 = $sides["side2"];
        $this->side3 = $sides["side3"];
    }
    
    function area() {
        $s = ($this->side1 + $this->side2 +$this->side3)/2;
        return sqrt($s*($s - $this->side1)*($s - $this->side2)*($s - $this->side3));
    }
    
    function perimeter() {
        return $this->side1+$this->side2+$this->side3;
    }

}
