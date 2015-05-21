<?php

/*
 * 文件名： teacher.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

/**
 * Description of teacher
 *
 * @author Better
 */
class teacher extends student {
    var $wage;
    function teaching(){
        echo $this->name."正在".$this->school."教学，每月工资为：".$this->wage."<br>";
    }
    
    
}
