<?php

/*
 * 文件名： index.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */



////require '../libs/Smarty.class.php';
////  $smarty = new Smarty ();
////  $smarty->template_dir = './templates/';
////  $smarty->compile_dir = './templates_c/';
////  $smarty->config_dir ='./configs';
////  $smarty->cache_dir = '/cache';
//
////$filepath = str_replace('\\', '/', dirname(__FILE__).DIRECTORY_SEPARATOR);   //这里是关键
////  //exit($filepath);
////  require $filepath.'libs/Smarty.class.php';
////  $smarty = new Smarty ();
////  $smarty->template_dir = $filepath.'templates';
////  $smarty->compile_dir = $filepath.'templates_c';
////  $smarty->config_dir = $filepath.'configs';
////  $smarty->cache_dir = $filepath.'cache';
//  
////require("libs/Smarty.class.php");
//$smarty = new Smarty();
//
//$smarty->setTemplateDir('/home/wwwroot/default/expatiatephp/smartymodule/demo/templates/');
//$smarty->setCompileDir('/home/wwwroot/default/expatiatephp/smartymodule/demo/templates_c/');
//$smarty->setConfigDir('/home/wwwroot/default/expatiatephp/smartymodule/demo/configs/');
//$smarty->setCacheDir('/home/wwwroot/default/expatiatephp/smartymodule/demo/cache/');
//
////$smarty->setLeftDelimiter('<{ ');
////$smarty->setRightDelimiter(' }>');
require('setup.php');
$smarty = new smartymodule();

$smarty->assign('title', '测试用的网页标题');
$smarty->assign('content', '测试用的网页内容');

$smarty->display('test.tpl');
?>

