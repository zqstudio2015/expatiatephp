<!DOCTYPE html>
<!--
文件名： login.php
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        function clearCookie() {
            setcookie('username', time() - 3600);
            setcookie('isLogin', '', time() - 3600);
        }

//        function _get($str) {
//            $val = !empty($_GET[$str]) ? $_GET[$str] : null;
//            return $val;
//        }

//var_dump($_GET["action"]);

        if (@$_GET["action"] == "login") {
            clearCookie();
            if ($_POST["username"] == "admin" && $_POST["password"] == "123456") {
                setcookie('username', $_POST["username"], time() + 60 * 60 * 24 * 7);
                setcookie('isLogin', '1', time() + 60 * 60 * 24 * 7);
                header("Location:index.php");
            } else {
                if ($_GET["action"] == "logout") {
                    clearCookie();
                } else {
                    die("用户名或密码错误！");
                }
            }
        }
        ?>
        <form action="login.php?action=login" method="post">            
            <table border="1" width="300" align="center" cellpadding="5" cellspacing="0">
                <caption><h1>用户登录</h1></caption>
                <tr>
                    <th>用户名</th>
                    <td><input type="text" name="username" size="25"></td>
                </tr>
                <tr>
                    <th>密&nbsp;&nbsp;码</th>
                    <td><input type="password" name="password" size="25"></td>
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