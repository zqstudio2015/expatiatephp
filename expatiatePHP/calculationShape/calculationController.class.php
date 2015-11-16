<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of formController
 *
 * @author BetterFeng
 */
class calculationController {
    private $shapeName;
    private $shapeAction;
    private $perimeter = 0;
    private $area = 0;

    function __construct() {
        $this->shapeName = 'calculation'. ucwords(isset($_GET["action"])? $_GET["action"]:"rect");
        $this->shapeAction = new $this->shapeName();
        
    }
    
    function __toString() { 
        if($this->shapeAction->shapePerimeter() > 0){
            $this->perimeter = round($this->shapeAction->shapePerimeter(), 2);
        }
        if($this->shapeAction->shapeArea() > 0){
            $this->area = round($this->shapeAction->shapeArea(),2);
        }
        $result = $this->shapeAction->shapeName.'的周长:'. $this->perimeter.'<br>';
        $result .= $this->shapeAction->shapeName.'的面积:'. $this->area .'<br>';
        return $result;
    }

}
