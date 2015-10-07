<?php

/*
 * 文件名： product_class.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

/**
 * Description of product_class
 *
 * @author Better
 */
class product {
    private $productID;
    private $name;
    private $price;
    private $description;
    
    /*构造方法，创建商品对象时，为成员属性赋初值
     * 参数 $product： 需要一个数组，通常为 $_POST,保存所有输入表单的值
     */
    public function __construct($product = array()) {
        foreach ($product as $property=>$value) {
            $this->$property=$value;
        }
    }
    
    public function getId(){
        if(!empty($this->productID)){
            return $this->productID;
        } else {
            return FALSE;
        }
    }
    
    public function getName(){
        if(!empty($this->name)){
            return $this->name;
        } else {
            return "未知商品名称";
        }
    }
    
    public function getScrPrice(){
        return $this->price();
    }
    
    public function getPrice(){
        if(!empty($this->price)){
            return $this->moneryFormat($this->price);
        } else {
            return "未知价格";
        }
    }
    
    public function getDescription(){
        if(!empty($this->description)){
            return $this->html2text($this->description);
        } else {
            return "该产品没有详细的介绍信息";
        }
    }
    
    private function html2text($html){
        return htmlspecialchars(stripslashes($this->description));
    }
    
    private function monerFormat($price){
        return number_format($price, 2, '.', ',');
    }
}
