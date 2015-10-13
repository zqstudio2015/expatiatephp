<?php

/*
 * 文件名： passSessionIDThroughURL.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
session_start();
echo '<a href="passSessionIDThroughURL.php?'.  session_name().'='.  session_id().'">连接演示</a>';
?>

