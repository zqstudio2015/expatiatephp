<?php

/*
 * 文件名： main.inc.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
include "./libs/Smarty.class.php";
define('SITE_ROOT', '/home/wwwroot/default/expatiatephp/smartymodule/demo');
$tpl = new Smarty();
$tpl->template_dir = SITE_ROOT."/templates";
$tpl->compile_dir = SITE_ROOT. "/templates_c";
$tpl->config_dir = SITE_ROOT. "/configs";
$tpl->cache_dir = SITE_ROOT. "/cache";
$tpl->caching = 1;
$tpl->cache_lifetime = 60*60*24;
$tpl->left_delimiter = '<{';
$tpl->right_delimiter = '}>';
?>

