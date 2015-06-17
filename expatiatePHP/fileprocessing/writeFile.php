<?php

/*
 * 文件名： writeFile.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

//$fileName = "data.txt";
$fileName = "data1.txt";
$data = "共十行数据\n";
$handle = fopen($fileName, 'w') or die('打开<br>'.$fileName.'<br>文件失败!!');
for($row = 0; $row <10; $row++){
//    fwrite($handle, $row.":www.fszqstudio.com\n");
    $data .= $row.":www.fszqstudio.com\n";
}
//fclose($handle);
file_put_contents($fileName, $data)
?>