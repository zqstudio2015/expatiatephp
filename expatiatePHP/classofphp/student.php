<?php

/*
 * 文件名： student.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

/**
 * Description of student
 *
 * @author Better
 */
class student extends person {
    var $school;
    function study(){
        echo $this->name."正在".$this->school."学习<br>";
    }
}
