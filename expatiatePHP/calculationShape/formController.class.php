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

    function __construct() {
        $this->shapeName = 'form'.ucwords(isset($_GET["action"])? $_GET["action"]:"rect");
        echo new $this->shapeName();
    }

}
