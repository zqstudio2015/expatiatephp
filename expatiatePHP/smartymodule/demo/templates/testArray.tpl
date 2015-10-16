<!DOCTYPE html>
<!--
文件名： testArray.tpl
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> <{ $title }> </title>
    </head>
    <body>
        <p>数组 contact
            <a>电子邮件： <{ $contact.email }> </a>
            <a>家庭电话： <{ $contact.phone.home }> </a>            
        </p>
        
        <p>数组 contact2
            <a>电子邮件： <{ $contact2[1] }> </a>
            <a>家庭电话： <{ $contact2[2][0] }> </a>            
        </p>
        
        <p>数组 contact3
            <a>电子邮件： <{ $contact3[0].first }> </a>
            <a>家庭电话： <{ $contact3.phone[0] }> </a>            
        </p>
        
    </body>
</html>
