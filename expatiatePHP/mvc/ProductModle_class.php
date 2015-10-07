<?php

/*
 * 文件名： ProductModle_class.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

/**
 * Description of ProductModle_class
 *
 * @author Better
 */
class ProductModle extends MyDB{
    public function addProduct($product){
        $query = "INSERT INTO product(name,pric,description) values(?,?,?)";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('sds',$name,$price,$description);
        $name = $product->getName();
        $price = $product->getSrcPrice();
        $description = $product->getDescription();
        $stmt->execute();
        
        if($stmt->affected_rows != 1){
            $this->printError("数据插入失败：".$stmt->error);
            return FALSE;
        } else {
            return $this->mysqli->insert_id;
        }
    }
}
