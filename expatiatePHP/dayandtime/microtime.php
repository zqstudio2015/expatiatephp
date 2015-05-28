<!DOCTYPE html>
<!--
文件名： microtime.php
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>使用微秒计算PHP脚本执行时间</title>
    </head>
    <body>
        <?php
        class timer{
            private $start_time;
            private $stop_time;
            
            function __construct() {
                $this->start_time = 0;
                $this->stop_time = 0;
            }
            
            function start(){
                $this->start_time = microtime(TRUE);
            }
            
            function stop(){
                $this->stop_time = microtime(TRUE);
            }
            
            function spent(){
                return round(($this->stop_time - $this->start_time), 4);
            }
        }
        $timer = new timer();
        $timer->start();
        usleep(1000);
        $timer->stop();
        echo "执行该脚本用时：<b>".$timer->spent()."</b>秒";
        ?>
    </body>
</html>
