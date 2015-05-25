<?php

/*
 * 文件名： articlepublishedacticle_class.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

/**
 * Description of articlepublishedacticle_class
 *
 * @author Better
 */
class article {
    private $subject;
    private $message;
    
    function __construct($subject, $message, $parse=  array()) {
        $this->subject=  $this->html2text($subject);
        
        if(!empty($parse)){
            foreach ($parse as $value){
                
            }
        }
        
    }
    
    function html2text($subject){
        
    }
}
