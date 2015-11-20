<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
﻿<?php
 
//php的时间是以秒算。js的时间以毫秒算
 
date_default_timezone_set("Asia/Hong_Kong");//地区
 
//配置每天的活动时间段
$starttimestr = "09:00:00";
$endtimestr = "18:30:00";
$starttime = strtotime($starttimestr);
$endtime = strtotime($endtimestr);
$nowtime = time();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP实时倒计时!</title>
<script language="JavaScript">
<!-- //
var EndTime=<?=$endtime*1000?>;
var NowTime = new Date();
//计算出服务器和客户端的时间差。
var dTime = NowTime.getTime()-<?=$nowtime*1000?>;
var runtimes = 0;
function GetRTime(){
var NowTime = new Date();
var dTimeNew = NowTime.getTime()-<?=$nowtime*1000?>;
var dTimesM = Math.abs(Math.floor((dTimeNew-runtimes*1000-dTime)/1000));//客户端时间和服务器当前时间的差
if (dTimesM>1) {//如果用户修改了客户端时间，就重新load本页
window.location.reload();
}
var nMS = EndTime - NowTime.getTime()+dTime;
var nH=Math.floor(nMS/(1000*60*60)) % 24;
var nM=Math.floor(nMS/(1000*60)) % 60;
var nS=Math.floor(nMS/1000) % 60;
document.getElementById("RemainH").innerHTML=nH;
document.getElementById("RemainM").innerHTML=nM;
document.getElementById("RemainS").innerHTML=nS;
if(nMS>5*59*1000&&nMS<=5*60*1000)
{
alert("还有最后五分钟！");
}
runtimes++;
 
setTimeout("GetRTime()",1000);
}
window.onload=GetRTime;
// -->
</script>
</head>
<body>
<h1>距离截止时间还有:<strong id="RemainH">XX</strong>小时<strong id="RemainM">XX</strong>分<strong id="RemainS">XX</strong>秒</h1>
</body>
</html>
