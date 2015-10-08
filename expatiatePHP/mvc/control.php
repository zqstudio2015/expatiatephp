<?php

/*
 * 文件名： control.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
function __autoload($className){
    include $className."_class.php";
}
$DbModle = new ProductModle();
switch ($_GET["action"]){
    case "add":
        $product = new Product($_POST);
        if($DbModle->addProduct($product)){
            header("Location:index.php");
        } else {
            echo '增加商品失败，请<a href="index.php">返回</a>';
        }
        break;
    case "modify":
        $product = new Product($_POST);
        if($DbModle->modifyProduct($product)){
            header("Location:index.php");
        } else {
            echo '修改商品失败，请<a href="index.php">返回</a>';
        }
        break;
    case "delete":
        $product = new Product($_POST);
        if($DbModle->deleteProduct($_GET["productID"])){
            header("Location:index.php");
        } else {
            echo '删除商品失败，请<a href="index.php">返回</a>';
        }
        break;
}
?>

