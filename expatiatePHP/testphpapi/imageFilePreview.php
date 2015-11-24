<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>上传图片</title>
    </head>

    <body><div align="center" style="width:100%; height:300px; font-size:13px">
            <h3>上传图片预览</h3>
            <form name="frm" method="post" enctype="multipart/form-data">
                <font style="letter-spacing:1px" color="#FF0000">*只允许上传jpg|png|bmp|pjpeg|gif格式的图片</font><br/><br/>
                请选择图片：
                <input name='upfile' type='file'/>
                <input name="btn" type="submit" value="上传" /><br />
            </form>
            <?php
//全局变量
            $arrType = array('image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/pjpeg');
            $max_size = '10000000';      // 最大文件限制（单位：byte）
            $upfile = '/home/wwwroot/default/expatiatephp/filesystem/updates'; //图片目录路径
            $file = $_FILES['upfile'];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') { //判断提交方式是否为POST
                if (!is_uploaded_file($file['tmp_name'])) { //判断上传文件是否存在
                    echo "<font color='#FF0000'>文件不存在！</font>";
                    exit;
                }

                if ($file['size'] > $max_size) {  //判断文件大小是否大于500000字节
                    echo "<font color='#FF0000'>上传文件太大！</font>";
                    exit;
                }
                if (!in_array($file['type'], $arrType)) {  //判断图片文件的格式
                    echo "<font color='#FF0000'>上传文件格式不对！</font>";
                    exit;
                }
                if (!file_exists($upfile)) {  // 判断存放文件目录是否存在
                    mkdir($upfile, 0777, true);
                }
                $imageSize = getimagesize($file['tmp_name']);
                $img = $imageSize[0] . '*' . $imageSize[1];
                $fname = $file['name'];
                $ftype = explode('.', $fname);
                $picName = $upfile . "/" . $fname;

                if (file_exists($picName)) {
                    echo "<font color='#FF0000'>同文件名已存在！</font>";
                    exit;
                }
                if (!move_uploaded_file($file['tmp_name'], $picName)) {
                    echo "<font color='#FF0000'>移动文件出错！</font>";
                    exit;
                } else {
                    echo "<font color='#FF0000'>图片文件上传成功！</font><br/>";
                    echo "<font color='#0000FF'>图片大小：$img</font><br/>";
                    echo "图片预览：<br><div style='border:#F00 1px solid; width:1024px;height:768px'>
    <img src=\"../filesystem/updates/" . $fname . "\" width=1024px height=768px>" . $fname . "</div>";
                }
            }
            ?>

        </div>
    </body>
</html>