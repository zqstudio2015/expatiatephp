<?php

/*
 * 文件名： index.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
session_start();
if($_SESSION["islogin"]){
    require 'connect.inc.php';
    echo "<p>当前用户为：<b>".$_SESSION["username"]."</b>,&nbsp";
    echo "<a href='maillogou.php'>退出</a></P>";
} else {
    header("Location:maillogin.php");
    exit();
}
?>
<html>
    <head><title>邮件系统</title></head>
    <body>
        <?php
        $userid = $_SESSION["userid"];
        $result = $mysqli->query("select * from mail where uid='{$userid}'");
        $mail_num = $result->num_rows;
        $mails = array();
        while($row = $result->fetch_assoc()){
            $mails[] = $row;
        }
        ?>
        <p>你的信箱中有<b><?php echo $mail_num;?></b>邮件</p>
        <table border="1" cellspacing="0" cellpadding="0" width="380">
            <tr>
                <th>编号</th><th>邮件标题</th><th>接收时间</th>
            </tr>
            <?php
            foreach($mails as $mail){
                echo '<tr align="center">';
                echo '<td>'.$mail["id"].'</td>';
                echo '<td>'.$mail["mailtitle"].'</td>';
                echo '<td>'.date("Y-m-d H:i:s", $mail["maildt"]).'</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </body>
</html>

