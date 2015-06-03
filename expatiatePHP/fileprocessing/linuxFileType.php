<?php

/*
 * 文件名： linuxFileType.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
echo filetype('/etc/passwd').'<br>';
echo filetype('/etc/grub2.cfg').'<br>';
echo filetype('/etc').'<br>';
echo filetype('/dev/sda1').'<br>';
echo filetype('/dev/tty1').'<br>';
////windows
//echo filetype("C:\\windows\\php.ini");
//echo filetype("C:\\windows");

?>

