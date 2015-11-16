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
class formRect extends formCreate {

    function __construct() {
        $this->shapeName = "rect";
    }

    function createForm() {
        $form = '<form action="index.php?action=' . $this->shapeName . '" method="post" target="_self">';
        $form .= '<b>请输入 矩形 的宽度和高度:</b><p>';
        $form .= '宽度:<input type="text" name="wide" value="' . (isset($_POST["wide"]) ? $_POST["wide"] : 0) . '"><br>';
        $form .= '高度:<input type="text" name="high" value="' . (isset($_POST["high"]) ? $_POST["high"] : 0) . '"><br>';
        $form .= '<br><input type="submit" name="sub" value="计算" ><br>';
        $form .= '</form>';
        return $form;
    }
}
