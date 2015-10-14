<?php

/*  类名为MyTpl是自定义的模板引擎，在PHP脚本中创建该类对象 */
/*  通过该类对象加载模板文件并解析，将解析后的结果输出         */

class MyTpl2 {
    /* 该类的构造方法，创建对象时初使化成员属性      */
    /* 参数template_dir: 指定存放模板文件的位置目录    */
    /* 参数compile_dir: 指定存放编译后的模板文件位置   */

    function __construct($template_dir = './templates/', $compile_dir = './templates_c/') {
        $this->template_dir = rtrim($template_dir, '/') . '/';   //将./templates/目录作为模板存放目录
        $this->compile_dir = rtrim($compile_dir, '/') . '/';    //初使化解析后的模板存放目录
        $this->tpl_vars = array();                     //为成员属性tpl_vars赋值为空数组
    }

    /* 调用该方法是用来将值分配给模板中对应的变量                   */
    /* 参数tpl_val: 需要一个字符串参数，要和模板中的变量名对应       */
    /* 参数value: 需要一个标量类型的值，用来分配给模板中变量的值    */

    function assign($tpl_var, $value = null) {
        if ($tpl_var != '')                    //如果第一个参数$tpl_var不是一个空字符串
            $this->tpl_vars[$tpl_var] = $value; //将第二个参数提供的值	添加到数组tpl_var中
    }

    /* 加载指定目录下的模板文件， 并将解析后的内容存放到另一个指定目录下的文件中 */
    /* 参数fileName:提供模板文件的文件名                                         */

    function display($fileName) {
        $tplFile = $this->template_dir . $fileName;     //到指定的目录中寻找模板文件
        if (!file_exists($tplFile)) {                 //如果需要处理的模板文件不存在
            return false;                       //结果该函数执行返回false
        }
        //获取编译过的模板文件，该文件中的内容都是被替换过的
        $comFileName = $this->compile_dir . "com_" . basename($tplFile) . '.php';
        //判断替换后的文件是否存在或是存在但有改动，都需要重新创建
        if (!file_exists($comFileName) || filemtime($comFileName) < filemtime($tplFile)) {
            $repContent = $this->tpl_replace(file_get_contents($tplFile));  //调用内部替换模板方法
            $handle = fopen($comFileName, 'w+');  //打开一个用来保存编译过的文件                             
            fwrite($handle, $repContent);         //向文件中写入内容                                              
            fclose($handle);                    //关闭打开的文件
        }
        include($comFileName);           //包含处理后的模板文件输出给客户端
    }

    /*  该方法使用正则表达式将模板文件'<{ }>'中的语句替换为对应的值或PHP代码 */
    /*  参数content: 提供从模板文件中读入的全部内容字符串                     */

    private function tpl_replace($content) {
        $pattern = array(//匹配模板中各种标识符的正则表达式的模式数组
            '/<\{\s*\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*\}>/i', //匹配模板中变量
            '/<\{\s*if\s*(.+?)\s*\}>(.+?)<\{\s*\/if\s*\}>/ies', //匹配模板中if标识符
            '/<\{\s*else\s*if\s*(.+?)\s*\}>/ies', //匹配elseif标识符
            '/<\{\s*else\s*\}>/is', //匹配else标识符
            '/<\{\s*loop\s+\$(\S+)\s+\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*\}>(.+?)<\{\s*\/loop\s*\}>/is', //用来匹配模板中的loop标识符，用来遍历数组中的值
            '/<\{\s*loop\s+\$(\S+)\s+\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*=>\s*\$(\S+)\s*\}>(.+?)<\{\s*\/loop\s*\}>/is', //用来匹配模板中的loop标识符，用来遍历数组中的键和值
            '/<\{\s*include\s+[\"\']?(.+?)[\"\']?\s*\}>/ie'                //匹配include标识符
        );
        $replacement = array(//替换从模板中使用正则表达式匹配到的字符串数组
            '<?php echo $this->tpl_vars["${1}"]; ?>', //替换模板中的变量
            '$this->stripvtags(\'<?php if(${1}) { ?>\',\'${2}<?php } ?>\')', //替换模板中的if字符串
            '$this->stripvtags(\'<?php } elseif(${1}) { ?>\',"")', //替换elseif的字符串
            '<?php } else { ?>', //替换else的字符串
            '<?php foreach($this->tpl_vars["${1}"] as $this->tpl_vars["${2}"]) { ?>${3}<?php } ?>',
            '<?php foreach($this->tpl_vars["${1}"] as $this->tpl_vars["${2}"] => $this->tpl_vars["${3}"]) { ?>${4}<?php } ?>', //这两条用来替换模板中的loop标识符为foreach格式
            'file_get_contents($this->template_dir."${1}")'         //替换include的字符串
        );
        $repContent = preg_replace($pattern, $replacement, $content);  //使用正则替换函数处理
        if (preg_match('/<\{([^(\}>)]{1,})\}>/', $repContent)) {       //如果还有要替换的标识
            $repContent = $this->tpl_replace($repContent);         //递归调用自己再次替换
        }
        return $repContent;                                   //返回替换后的字符串
    }

    /* 该方法用来将条件语句中使用的变量替换为对应的值             */
    /* 参数expr: 提供模板中条件语句的开始标记                     */
    /* 参数statement: 提供模板中条件语句的结束标记                 */

    private function stripvtags($expr, $statement = '') {
        $var_pattern = '/\s*\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*/is';  //匹配变量的正则
        $expr = preg_replace($var_pattern, '$this->tpl_vars["${1}"]', $expr);   //将变量替换为值
        $expr = str_replace("\\\"", "\"", $expr);             //将开始标记中的引号转义替换
        $statement = str_replace("\\\"", "\"", $statement);     //替换语句体和结束标记中的引号
        return $expr . $statement;                         //将处理后的条件语句相连后返回
    }

}

?>
