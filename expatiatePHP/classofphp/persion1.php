<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of persion1
 *
 * @author BetterFeng
 */
header("Content-Type:text/html;charset=utf-8");

class Persion1 {
    private $name;
    
    function __construct($name = ""){
        $this->name = $name;
    }
    
    function __set($propertyName, $propertyValue) {
        
        $this->$propertyName = $propertyValue;
    }
    
    function __isset($propertyName) {
        return isset($this->$propertyName);
    }

        public function say(){
        echo '我的名字:'.$this->name;
    }
}

$persion1 = new Persion1("张三");
$persion1->name = "李四";
$persion1->say();
var_dump(isset($persion1->name));
