<?php

/*
 * 文件名： articlepublishedacticle_class.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

/**
 * Description of articlepublishedacticle_class
 *
 * @author Better
 */
class acticle {
    private $subject;
    private $message;
    
    function __construct($subject, $message, $parse =  array()) {
        $this->subject =  $this->html2text($subject);
        
        if(!empty($parse)){
            foreach ($parse as $value){
                switch ($value){
                    case 1:
                        $message = $this->dehtmltages($message);
                        break;
                    case 2:
                        $message = $this->html2text($message);
                        break;
                    case 3:
                        $message = $this->ubbcode2html($message);
                        break;
                    case 4:
                        $message = $this->parseurl($message);
                        break;
                    case 5:
                        $message = $this->parsesmilies($message);
                        break;
                    case 6:
                        $message = $this->disablekeywords($message);
                        break;
                    case 7:
                        $message = $this->parsephpcode($message);
                        break;
                    case 8:
                        $message = $this->parseper($message);
                        break;
                    case 9:
                        $message = $this->nltobr($message);
                        break;
                }
            }
        }
        $this->message=$message;
    }
    
    private function dehtmltages($message){
        return strip_tags($message);
    }
            
    private function html2text($message){
        return htmlspecialchars(stripslashes($message));
    }
    
    private function ubbcode2html($message){
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
            
            return preg_replace($pattarn, $replace, $message);
    }
    
    private function cuturl($url){
        $length = 65;
        $urllink = "<a href=\"".(substr(strtolower($url), 0, 4)=='www'?"http://$url":$url).'"target="_blank">';
        if(strlen($url) > $length){
            $url = substr($url, 0, intval($length * 0.5)). '...'. substr($url, -intval($length * 0.3));
        }
        $urllink .= $url.'</a>';
        return $urllink;
    }
    
    private function parseurl($message){
        $urlpattern = "/(www.|https?:\/\/|telnet:\/\/){1}([^[\"']+?)(com|net|org)(\/[\w-\.\/\?\%\&\=]*)?/ei";
        return preg_replace($urlpattern, "\$this->cuturl('\\1\\2\\3\\4')", $message);
    }
    
    private function parsesmilies($message){
        $pattern = array('/:\)|\/wx|微笑/i', 
                    '/:@|\/fn|发怒/i', 
                    '/:kiss|\/kill\/sa|示爱/', 
                    '/:p|\/tx|偷笑/i', 
                    '/:q|\/dk|大哭/k');
        $replace = array('<img src="expression_gif/smile.gif" alt="微笑">', 
                    '<img src="expression_gif/huffy.gif" alt="发怒">', 
                    '<img src="expression_gif/kiss.gif" alt="示爱">', 
                    '<img src="expression_gif/titter.gif" alt="偷笑">', 
                    '<img src="expression_gif/cry.gif" alt="大哭">', 
            );
            return preg_replace($pattern, $replace, $message);
    }
    
    private function disablekeywords($message){
        $keywords_disable = array("非法关键字一", "非法关键字二", "非法关键字三");
        return str_replace($keywords_disable, "**", $message);
    }
    
    private function parsephpcode($message) {
        $pattarn = '/(<\?.*?\?>)/ise';
        $replace = '"<pre style=\"background:#ddd\">".highlight_string("\\1",true)."</pre>"';
        return preg_replace($pattern, $replace, $message);
    }
    
    private function parseper($message){
        return '<pre>'.$message.'</pre>';
    }
    
    private function nltobr($message){
        return nl2br($message);
    }
    
    public function getsubject() {
        return '<h1 align=center>'.$this->subject.'</h1>';
    }
    
    public function getmessage() {
        return $this->message;
    }
}
