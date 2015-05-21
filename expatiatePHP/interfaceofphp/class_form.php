<?php

/*
 * 文件名： class_form.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

/**
 * Description of class_form
 *
 * @author Better
 */
class form {

    private $form_name;
    private $request;
    private $action;
    private $method;
    private $target;

    function __construct($form_name, $request, $action = "index.php", $method = "get", $target = "_self") {
        $this->form_name = $form_name;
        $this->request = $request;
        $this->action = $action;
        $this->method = $method;
        $this->target = $target;
    }

    function __toString() {
//        $str = '<form action ='.$this->action.' method='.$this->method.' target='.$this->target.'>';
//        $str.='<table align=center border=0 width=400>';
        $str = '<table align=center border=0 width=400>';
        $str .= '<caption><h3>' . $this->form_name . "</h3></caption>";
        $str .= '<form action =' . $this->action . ' method=' . $this->method . ' target=' . $this->target . '>';
        switch ($this->request["action"]) {
            case 1:
                $str.='<tr><th>矩形高度：</th><td>';
                $str.='<input type="text" name="height" value=' . $this->request["height"] . '>';
                $str.='</td></tr>';
                $str.='<tr><th>矩形宽度：</th><td>';
                $str.='<input type="text" name="width" value=' . $this->request["width"] . '>';
                $str.='</td></tr>';
                break;
            case 2:
                $str.='<tr><th>第一条边：</th><td>';
                $str.='<input type="text" name="side1" value=' . $this->request["side1"] . '>';
                $str.='</td></tr>';
                $str.='<tr><th>第二条边：</th><td>';
                $str.='<input type="text" name="side2" value=' . $this->request["side2"] . '>';
                $str.='</td></tr>';
                $str.='<tr><th>第三条边：</th><td>';
                $str.='<input type="text" name="side3" value=' . $this->request["side3"] . '>';
                $str.='</td></tr>';
                break;
            case 3:
                $str.='<tr><th>圆的半径：</th><td>';
                $str.='<input type="text" name="radius" value=' . $this->request["radius"] . '>';
                $str.='</td></tr>';
        }
        $str .= '<tr><td align=center colspan=2><input type="submit" value="计算"></td></tr>';
        $str .= '<input type="hidden" name="act" value=' . $this->request["action"] . '>';
        $str .= '<input type="hidden" name="action" value=' . $this->request["action"] . '>';
        $str .= '</form>';
        $str .= '</table>';
//        $str.='</form>';

        return $str;
    }

}
