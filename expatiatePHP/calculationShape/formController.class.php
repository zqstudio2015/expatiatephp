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
class formController {

    private $shapeName;
    private $shapeAction;
                function __construct() {
        $this->shapeName = 'form'.ucfirst(isset($_GET["action"])? $_GET["action"]:"rect");
//        echo (new $this->shapeName())->createForm();
        $this->shapeAction = new $this->shapeName();
        echo $this->shapeAction->createForm();
    }

}
