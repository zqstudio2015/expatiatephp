<?php

/*
 * 文件名： excutesSQLCommandsSelect.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
header("Content-Type:text/html;charset=utf-8");
$link = mysql_connect("192.168.8.233", "fszqit", "1qaz@WSX") or die("连接失败：" . mysql_error());
mysql_select_db('bookstore', $link) or die('不能选定数据库 bookstore：' . mysql_error()); 

//执行 DQL 命令返回结果集 $result
$result = mysql_query("select bookId, bookName, bookAuthor, publishingHouse, bookPrice, bookDescription from books");
echo '<table align="center" width="80%" border="1">';
echo '<caption><h1>图书信息表<h1></caption>';
echo '<th>编号</th><th>图书名</th><th>作者</th><th>出版社</th><th>价格</th><th>介绍</th>';
while ($row = mysql_fetch_row($result)) {
    echo '<tr>';
    foreach ($row as $data) {
        echo '<td>'. $data. '</td>';
    }
    echo '</tr>';
}
echo '</table>';
mysql_free_result($result);
mysql_close($link);
?>

