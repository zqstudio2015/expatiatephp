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
class calculationTriangle extends calculationShape {

    private $side1 = 0;
    private $side2 = 0;
    private $side3 = 0;

    function __construct() {
        $this->shapeName = "三角形";
        if ($this->validate(isset($_POST["side1"]) ? $_POST["side1"] : 0, "第一边") && $this->validate(isset($_POST["side2"]) ? $_POST["side2"] : 0, "第二边") && $this->validate(isset($_POST["side3"]) ? $_POST["side3"] : 0, "第三边")) {
            $this->side1 = $_POST["side1"];
            $this->side2 = $_POST["side2"];
            $this->side3 = $_POST["side3"];
        }
    }

    function shapeArea() {
        $s = ($this->side1 + $this->side2 + $this->side3) / 2;
        return sqrt($s * ($s - $this->side1) * ($s - $this->side2) * ($s - $this->side3));
    }

    function shapePerimeter() {
        return $this->side1 + $this->side2 + $this->side3;
    }

}
