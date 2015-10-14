<?php 
/*
 * 文件名： MyTpl_class.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

/**
 * Description of MyTpl_class
 *
 * @author Better
 */
class MyTpl {
   
    /*该类的构造方法，创建对象时初始化成员属性
     * 参数 template_dir：指定存放模版稳健的位置目录
     * 参数 compile_dir：指定存放变异后的模版文件位置
     */
    function __construct($temple_dir='./templates/', $compile_dir='./templates_c/') {
        $this->template_dir=  rtrim($temple_dir, '/').'/';
        $this->compile_dir = rtrim($compile_dir, '/').'/';
        $this->tpl_vars = array();
    }
    
    
    /*调用该方法是用来将值分配给模版中对应的变量
     * 参数 tpl_val：需要一个字符串参数，要和模版中的变量名对应
     * 参数 value：需要一个标量类型的值，用来分配给模版中变量的值
     */
    function assign($tpl_val, $value=null){
        if($tpl_val != ''){
            $this->tpl_vars[$tpl_val] = $value;
            
        }
    }
    
    /*加载指定目录下的模版文件，并将解析厚的内容存放到另一个指定目录下的文件中
     * 参数 fileName：提供模版稳健的文件名
     */
    function display($fileName){
        $tplFile = $this->template_dir.$fileName;
        if(!file_exists($tplFile)){
            return FALSE;
        }
        
        $comFileName = $this->compile_dir."com_".basename($tplFile).'.php';
        
        if(!file_exists($comFileName) || filemtime($comFileName) <  filemtime($tplFile)){
            $repContent = $this->tpl_replace(file_get_contents($tplFile));
            $handle = fopen($comFileName, 'w+');
            fwrite($handle, $repContent);
            fclose($handle);
        }
        include($comFileName);
    }
    
    /*该方法使用正则表达式将模版文件 '<{}>'中的语句替换为对应的值或PHP代码
     * 参数 content：提供从模版文件中读入的全部内容字符串
     */
    private function tpl_replace($content){
        $pattern = array(
            '/<\{\s*\$([a-zA-Z_\x7f-\xff\[a-zA-Z0-9_\x7f-\xff]*)\s*\}>/i',
            '/<\{\s*if\s*(.+?)\s*\}>(.+?)<\{\s(\/if\s*\}>/ies',
            '/<\{\s*else\s*if\s((.+?)\s*\}>/ies',            
            '/<\{\s(else\s*\}>/is',
            '/<\{\s*loop\s+\$(\S+)\s+\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*\}>(.+?)<\{\s*\/loop\s*\}>/is',
            '/<\{\s*loop\s+\$(\S+)\s+\$([a-zA-Z_\x7f-\xff][a-ZA-Z0-9_\x7f-\xff]*)\s*=>\s*\$(\S+)\s*\}>(.+?)<\{\s*\/loop\s*\}>/is',
            '/<\{\s*include\s+[\"\']?(.+?)]\"\']?\s*\}>/ie'
        );
        $replacement = array(
            '<?php echo $this->tpl_vars["${1}"]; ?>',
            '$this->stripvtags(\'<?php if(${1}) { ?>\',\'${2}<?php } ?>\')',
            '$this->stripvtags(\'<?php } elseif(${1}) { ?>\',"")',
            '<?php } else { ?>',
            '<?php foreach($this->tpl_vars["${1}"] as $this->tpl_vars["${2}"]) { ?>${3}<?php } ?>',
            '<?php foreach($this->tpl_vars["${1}"] as $this->tpl_vars["${2}"] => $this->tpl_vars["${3}"]) { ?>${4}<?php } ?>',
            'file_get_contents($this->template_dir."${1}")'
        );
        $repContent = preg_replace($pattern, $replacement, $content);
        if(preg_match('/<\{([^(\}>)]{1,})\}>/', $repContent)) {
            $repContent = $this->tpl_replace($repContent);
        }
        return $repContent;
    }
    
    /*该方法用来讲条件语句中使用的变量替换为对应的值
     * 参数 expr：提供模板中的条件语句的开始标记
     * 参数 statement：提供模版中条件语句的结束标记
     */
    private function strpvtags($expr, $statement){
        $var_pattern = '/\s*\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*/is';
        $expr = preg_replace($var_pattern, '$this->tpl_vars["${1}"]', $expr);
        $expr = str_repeat("\\\"", "\"",$expr);
        $statement = str_repeat("\\\"", "\"", $statement);
        return $expr.$statement;
    }
}
