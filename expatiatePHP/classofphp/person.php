<?php

/*
 * 文件名： person.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

/**
 * 创建一个类，人。
 *
 * @author Better
 */
class person {

//    var $name;
//    var $age;
//    var $sex;
    private $name;
    private $age;
    private $sex;

    function __construct($name = "小芳", $sex = "女", $age = 18) {
        $this->name = $name;
        $this->sex = $sex;
        $this->age = $age;
    }

//    public function get_name() {
//        return $this->name;
//    }
//
//    public function set_name($name) {
//        $this->name = $name;
//    }

    function __toString() {
        return $this->name;
    }
    
    function __call($function_name, $arguments) {
        echo "调用的函数：".$function_name."(参数：";
        print_r($arguments);
        echo "不存在<br>";        
    }


    private function __set($property_name, $property_value) {
        if ($property_name === "sex") {
            if (!($property_value == "男" || $property_value == "女")) {
                return;
            }
        }
        if ($property_name === "age") {
            if ($property_value < 150 || $property_value > 0) {
                return;
            }
        }
        $this->$property_name = $property_value;
    }

    private function __get($propertyname) {
        if($propertyname == "sex"){
            return "保密";
        } else if($propertyname == "age"){
            if($this->age>30)
                return $this->age - 10;
            else
                return $this->$propertyname;
        } else {
             return $this->$propertyname;
        }
    }
    
    private function __isset($propertyname) {
        if($propertyname == "name")
            return FALSE;
        
        return isset($this->$propertyname);
    }
    
    private function __unset($propertyname) {
        if ($propertyname == "name")
            return;
        
        unset($this->$propertyname);
    }
            
    public function say() {
//        echo "这个人在说话<br>";
        echo "我的名字叫：" . $this->name . "， 性别：" . $this->sex . "， 我的年龄是：" . $this->age . "。<br>";
    }

    function eat($food) {
//        echo "这个人在吃" . $food."<br>";
        echo $this->name . "再吃" . $food . "<br>";
    }

    function run() {
//        echo "这个人再走<br>";
        echo $this->name . "在走路<br>";
    }

    function __destruct() {
        echo $this->name . "已经死亡<br>";
    }

}

//$person1 = new person();
//$person1->say();
?>
