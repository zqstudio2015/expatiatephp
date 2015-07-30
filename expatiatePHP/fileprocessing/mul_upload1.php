<?php

/*
 * 文件名： mul_upload.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
//设置编码为UTF-8，以避免中文乱码
header('Content-Type:text/html;charset=utf-8');
if (count($_FILES) > 0) {
    $fileCount = count($_FILES['myfile']['name']);
    if ($fileCount > 0) {
        for ($i = 0; $i < $fileCount; $i++) {
            if ($_FILES['myfile']['error'][$i] > 0) {
                echo '上传错误:';
                switch ($_FILES['myfile']['error'][$i]) {
                    case 1:
                        echo '上传文件大小超出PHP配置文件中的约定值：upload_max_filesize';
                        break;
                    case 2:
                        echo '上传文件大小超出表单中的约定值：MAX_FILE_SIZE';
                        break;
                    case 3:
                        echo '文件只被部分上载';
                        break;
                    case 4:
                        echo '没有上传任何文件';
                        break;
                    default:
                        echo "未知错误！";
                }
                exit;
            }
            list($maintype, $subtype) = explode("/", $_FILES['myfile']['type'][$i]);
            if ($maintype == "text") {
                echo '问题：不能上传文本文件。';
                exit;
            }

            $upfile = './uploads/' . date('YmdHis', time()) . $_FILES['myfile']['name'][$i];
            if (is_uploaded_file($_FILES['myfile']['tmp_name'][$i])) {
                if (!move_uploaded_file($_FILES['myfile']['tmp_name'][$i], $upfile)) {
                    echo '问题：不能将文件移动到指定目录。';
                    exit;
                }
            } else {
                echo '问题：上传文件不是一个合法文件：';
                echo $_FILES['myfile']['name'][$i];
                exit;
            }
            echo '文件' . $upfile . '上传成功，大小为' . $_FILES['myfile']['size'][$i] . '!<br>';
        }
    }
} else {
    echo '问题：上传文件超出上传文件限制！';
}
//print_r('<pre>');
//print_r($_FILES);
?>

