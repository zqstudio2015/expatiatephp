<?php

/*
 * 文件名： setup.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

/**
 * Description of setup
 *
 * @author Better
 */
//$php_self = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
//if ('/' == substr($php_self, -1))
//{
//    $php_self .= 'index.php';
//}

define('SMARTY_DIR', '/home/wwwroot/default/expatiatephp/smartymodule/libs/');
define('WEBHOME', '/home/wwwroot/default/expatiatephp/smartymodule/demo/');
require(SMARTY_DIR . 'Smarty.class.php');

class smartymodule extends Smarty {

    function __construct() {
        parent::__construct();

        $this->setTemplateDir(WEBHOME. 'templates/');
        $this->setCompileDir(WEBHOME. 'templates_c/');
        $this->setConfigDir(WEBHOME. 'configs/');
        $this->setCacheDir(WEBHOME. 'cache/');
        
        $this->caching = Smarty::CACHING_LIFETIME_CURRENT;
        $this->assign('app_name', '佛山昭群信息科技');
        $this->setLeftDelimiter('<{ ');
        $this->setRightDelimiter(' }>');
    }

}
