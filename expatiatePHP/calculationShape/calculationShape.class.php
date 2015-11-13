<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of calculationShape
 *
 * @author BetterFeng
 */
abstract class calculationShape {

    public $shapeName;

    abstract function shapeArea();

    abstract function shapePerimeter();
    
    protected function validate($value, $message = "输入的值"){
        if($value == "" || !is_numeric($value) || $value < 0){
            $message = $this->shapeName.$message;
            echo '<font color="red">'.$message.'必须为非负值的数字,并且不能为空</font><br>';
            return FALSE;
        } else {
            return true;
        }
    }
}
