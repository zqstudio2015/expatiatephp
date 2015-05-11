<?php

/*
 * 版权所有:Copyright (C) 2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
$cid = $_GET["cid"];
$mysqli = new mysqli("localhost", "fszqit", "1qaz@WSX", "expatiatephp");
$result = $mysqli->query("select id, title from card where cid={$cid}");
while ($row = $result->fetch_assoc()) {
    echo '<ul>';
    echo '<li><a href="con.php?id=' . $row["id"] . '">' . $row["title"] . '</a></li>';
    echo '</ul>';
}
//var_dump($result);


