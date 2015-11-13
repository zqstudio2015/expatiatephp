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
        $this->shapeName = (isset($_GET["action"])? $_GET["action"]:"rect"). 'Form';
        echo new $this->shapeName();
    }

}
