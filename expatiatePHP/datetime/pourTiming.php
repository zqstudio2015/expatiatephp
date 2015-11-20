<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$now = strtotime("now");
$endtime = strtotime("2015-11-20 23:59:59");

$second = $endtime - $now;
$year = floor($second/3600/24/365);

$temp = $second - $year*365*24*3600;
$month = floor($temp/3600/24/30);

$temp = $temp - $month*30*24*3600;
$day = floor($temp/3600/24);

$temp = $temp - $day*3600*24;
$hour = floor($temp/3600);

$temp = $temp - $hour*3600;
$minute = floor($temp/60);

$second1 = $temp - $minute*60;

echo "距离截止时间还有 {$year} 年 {$month} 月 {$day} 天 {$hour} 小时 {$minute} 分 {$second1} 秒";
