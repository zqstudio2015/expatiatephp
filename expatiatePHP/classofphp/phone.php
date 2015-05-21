<?php

/*
 * 文件名： phone.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

/**
 * Description of phone
 *
 * @author Better
 */
class phone {
    var $manufactures;
    var $color;
    var $battery_capacity;
    var $screen_size;
    
    function call(){
        echo "正在打电话";
    }
    
    function  message(){
        echo "正在发信息";
    }
    
    function play_music(){
        echo "正在播放音乐";
    }
    
    function phonto(){
        echo "正在拍照";
    }
    
}
