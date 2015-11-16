<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rectForm
 *
 * @author BetterFeng
 */
class formCircle extends formCreate{

    function __construct() {
        $this->shapeName = "circle";
    }

    function __toString() {
        $form = '<form action="index.php?action=' . $this->shapeName . '" method="post" target="_self">';
        $form .= '<b>请输入 圆形 的半径:</b><p>';
        $form .= '半径:<input type="text" name="radius" value="' . (isset($_POST["radius"]) ? $_POST["radius"] : 0) . '"><br>';
        $form .= '<br><input type="submit" name="sub" value="计算" ><br>';
        $form .= '</form>';
        return $form;
    }
    

}
