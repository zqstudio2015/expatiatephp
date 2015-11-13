<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rectCalculation
 *
 * @author BetterFeng
 */
class circleCalculation extends calculationShape {

    private $radius = 0;

    function __construct() {
        $this->shapeName = "圆形";
        if ($this->validate(isset($_POST["radius"]) ? $_POST["radius"] : 0, "宽度") ) {
            $this->radius = $_POST["radius"];
        }
    }

    function shapeArea() {
        return pi()*$this->radius*$this->radius;
    }

    function shapePerimeter() {
            return 2*pi()*$this->radius;       
    }

}
