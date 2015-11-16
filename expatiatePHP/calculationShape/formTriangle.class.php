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
class formTriangle extends formCreate {

    function __construct() {
        $this->shapeName = "triangle";
    }

    function createForm() {
        $form = '<form action="index.php?action=' . $this->shapeName . '" method="post" target="_self">';
        $form .= '<b>请输入 三角形 的三边:</b><p>';
        $form .= '第一边:<input type="text" name="side1" value="' . (isset($_POST["side1"]) ? $_POST["side1"] : 0) . '"><br>';
        $form .= '第二边:<input type="text" name="side2" value="' . (isset($_POST["side2"]) ? $_POST["side2"] : 0) . '"><br>';
        $form .= '第三边:<input type="text" name="side3" value="' . (isset($_POST["side3"]) ? $_POST["side3"] : 0) . '"><br>';
        $form .= '<br><input type="submit" name="sub" value="计算" ><br>';
        $form .= '</form>';
        return $form;
    }

}
