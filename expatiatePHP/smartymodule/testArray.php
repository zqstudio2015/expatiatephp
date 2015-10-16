<?php

/*
 * 文件名： testArray.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

/**
 * Description of testArray
 *
 * @author Better
 */
require('setup.php');
$smarty = new smartymodule();

$smarty->assign('title', '向模版中分配数组');
$contact = array('fax' => '0757-86782170', 
        'email' => 'gao@fszqit.com',
        'phone' => array('home' => '86782170',
                    'cell' => '185660725885')
    );
$smarty->assign('contact', $contact);

$contact2 = array('0757-86782170', 
        'gao@fszqit.com',
        array('86782170', '185660725885')
    );
$smarty->assign('contact2', $contact2);

$contact3 = array('fax' => '0757-86782170', 
        array('first' => 'ttt@163.com', 'second' => 'feng@163.com' ),
        'phone' => array('86782170',
                    '185660725885')
    );
$smarty->assign('contact3', $contact3);

$smarty->display('testArray.tpl');
?>
