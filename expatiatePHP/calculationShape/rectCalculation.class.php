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
class rectCalculation extends calculationShape {

    private $wide = 0;
    private $high = 0;

    function __construct() {
        $this->shapeName = "矩形";
        if ($this->validate(isset($_POST["wide"]) ? $_POST["wide"] : 0, "宽度") && $this->validate(isset($_POST["high"]) ? $_POST["high"] : 0, "高度")) {
            $this->wide = $_POST["wide"];
            $this->high = $_POST["high"];
        }
    }

    function shapeArea() {
        return $this->wide * $this->high;
    }

    function shapePerimeter() {
            return 2 * ($this->wide + $this->high);        
    }

}
