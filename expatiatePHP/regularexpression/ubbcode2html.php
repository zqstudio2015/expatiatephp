<!DOCTYPE html>
<!--
文件名： ubbcode2html.php
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>UBB</title>
    </head>
    <body>
        <!--<img src="http://img13.360buyimg.com/da/jfs/t1291/177/254538044/322787/a4a040f6/555f0767N65716c7a.jpg" />-->
        <?php
        $text = "将本行本文本[b]加粗[/b]
                将本行本文本改为[i]斜体[/i]
                将本行文本加上[u]下画线[/u]
                本行文字大小为[size=7][color=red]7号字，红色[/color][/size]
                [align=center]将本行居中[/align]
                链接到[url=http://bbs.lampborther.net]LAMP兄弟连[/url]
                [url]这个链接很长将被截断这个链接很长将被截断这个链接很长将被截断[/url]
                给[email=skygao@lampborther.net]高洛峰[/email]发信
                在此处插入[img]http://img13.360buyimg.com/da/jfs/t1291/177/254538044/322787/a4a040f6/555f0767N65716c7a.jpg[/img]图片
                [b][i][u][align=center]本行加粗、斜体并带有下画线，而且居中文字[/align][/u][/i][/b]";        
        
        echo ubbcode2html($text);
        
        function ubbcode2html($text){
            $pattarn = array('/(\r\n)|(\n)/', '/\[b\]/i', '/\[\/b\]/i', 
                '/\[i\]/i', '/\[\/i\]/i', '/\[u\]/i', '/\[\/u\]/i', 
                '/\[font=([^\[\<]+?)\]/i', 
                '/\[color=([#\w]+?)\]/i', 
                '/\[size=(\d+?)\]/i', 
                '/\[size=(\d+(\.\d+)?(px|pt|in|cm|mm|pc|em|ex|%)+?)\]/i', 
                '/\[align=(left|center|right)\]/i', 
                '/\[url=www.([^\["\']+?)\](.+?)\[\/url\]/is', 
                '/\[url=(https?|ftp|gopher|news|telnet){1}:\/\/([^\["\']+?)\](.+?)\[\/url\]/is', 
                '/\[email\]\s*([a-z0-9\-_.+]+)@([a-z0-9\-_]+[.][a-z0-9\-_.]+)\s*\[\/email\]/i', 
                '/\[email=([a-z0-9\-_.+]+)@([a-z0-9\-_]+[.][a-z0-9\-_.]+)\](.+?)\[\/email\]/is', 
                '/\[img\](.+?)\[\/img\]/', 
                '/\[\/color\]/i', 
                '/\[\/size\]/i', 
                '/\[\/font\]/i', 
                '/\[\/align\]/');
            
            $replace= array('<br>', '<b>', '</b>', 
                '<i>', '</i>', '<u>', '</u>', 
                '<font face="\\1">', 
                '<font color="\\1">', 
                '<font size="\\1">', 
                '<font style=\"font-size:\\1\">', 
                '<p align="\\1">',
                '<a href="http//www.\\1" target="_blank">\\2</a>', 
                '<a href="\\1://\\2" target="_blank">\\3</a>', 
                '<a href="mailto:\\1@\\2">\\1@\\2</a>', 
                '<a href="mailto:\\1@\\2">\\3</a>', 
                '<img src="\\1">', 
                '</font>',
                '</font>', 
                '</font>', 
                '</p>');
            
            return preg_replace($pattarn, $replace, $text);
        }
        ?>
    </body>
</html>
