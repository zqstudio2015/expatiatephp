<?php

/*
 * 文件名： usedMyTpl.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
require "MyTpl_class.php";
//require "MyTpl2_class.php";
$tpl = new MyTpl("./templates/", "./templates_c");
$tpl->assign("title", "自定义模板引擎示例");
$tpl->assign("var", "This is a value");
//var_dump($tpl->tpl_vars);
//$tpl->assign("arr", array(array(1, 2), array(a, b)));
$tpl->display("test.tpl");
?>

