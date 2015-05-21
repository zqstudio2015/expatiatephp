<?php

/*
 * 文件名： class_form.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

/**
 * Description of class_form
 *
 * @author Better
 */
class form {
    private $form_name;
    private $request;
    private $action;
    private $method;
    private $target;
    
    function __construct() {
        $str = "<form action =".$this->action."method=".$this->method."target=".$this->target.">";
        $str.="<table align=center border=0 width=400>";
        $str.="<caption><h3>".$this->form_name."</h3></caption>";
        
    }
}
