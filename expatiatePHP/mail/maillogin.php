<?php

/*
 * 文件名： maillogin.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
session_start();
require "connect.inc.php";
if(@$_GET["action"] == "login"){
    $username = $_POST["username"];
    $userpwd = md5($_POST["password"]);
    $sql = "select * from user where username='{$username}' and userpwd='{$userpwd}'";
    $result = $mysqli->query($sql);
    if($result->num_rows >0){
        $row = $result->fetch_assoc();
        $_SESSION["username"] = $username;
        $_SESSION["userid"] = $row["id"];
        $_SESSION["islogin"] = 1;
        header("Location:index.php");
    } else {
        echo '<font color="red">用户名或密码错误</font>';
    }
}
?>
<html>
    <head><title>邮件登陆系统</title></head>
    <body>
        <p>欢迎光临伪邮件系统</p>
        <p>
            Session ID:<?php echo session_id();?>
        </p>
        <form action="maillogin.php?action=login" method="post">
            <table width="300" border="1" align="center" cellspacing="5">
                <tr>
                    <td width="30%" align="right">用户名：</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td width="30%" align="right">密码：</td>
                    <td><input type="text" name="password"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="登录">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>

