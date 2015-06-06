<?php

/*
 * 文件名： traverseDirectory.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */
$num = 0;
$dirname = '../../expatiatephp';
$dir_handle = opendir($dirname);

echo '<table border="0" align="center" width="600" cellspacing="0" cellpadding="0">';
echo '<caption><h2>目录'.$dirname.'下面的内容</h2></caption>';
echo '<tr align="left" bgcolor="#cccccc">';
echo '<th>文件名</th><th>文件大小</th><th>文件类型</th><th>修改时间</th></tr>';
while ($file = readdir($dir_handle)){
    $dirFile = $dirname."/".$file;
    if($num++%2==0)
        $bgcolor='#ffffff';
    else
        $bgcolor='#cccccc';
    echo '<tr bgcolor='.$bgcolor.'>';
    echo '<td>'.$file.'</td>';
    echo '<td>'.filesize($dirFile).'</td>';
    echo '<td>'.filetype($dirFile).'</td>';
    echo '<td>'.date("Y/n/t", filemtime($dirFile)).'</td>';
    echo '</tr>';
}
echo '</table>';
closedir($dir_handle);
echo '在<b>'.$dirname.'</b>目录下的子目录和文件共有<b>'.$num.'</b>个<br>';

/**********************
一个简单的目录递归函数
第一种实现办法：用dir返回对象
***********************/
function tree($directory)
{
    $mydir = dir($directory);
    echo '<ul style="list-style-type:none">';
    while($file = $mydir->read())
    {
        if((is_dir("$directory/$file")) AND ($file!=".") AND ($file!=".."))
        {
            echo "<li><font color=\"#ff00cc\"><b>$file</b></font></li>\n";
            tree("$directory/$file");
        }
        else{
             if($file!="." && $file!="..")
                    {
                        echo "<li>$file</li>\n";
                    }
        }
        
    }
    echo "</ul>\n";
    $mydir->close();
}
//开始运行

echo "<h2>目录为粉红色</h2><br>\n";

tree("../../expatiatephp");

/***********************
第二种实现办法：用readdir()函数
************************/
function listDir($dir)
{
    if(is_dir($dir))
    {
        if ($dh = opendir($dir))
        {
            while (($file = readdir($dh)) !== false)
            {
                if((is_dir($dir."/".$file)) && $file!="." && $file!="..")
                {
                    echo '<br><hr>';
                    echo "<b><font color='red'>文件夹名：</font></b>",$file,"<br><hr>";
                    listDir($dir."/".$file."/");
                }
                else
                {
                    if($file!="." && $file!="..")
                    {
                        echo $file."<br>";
                    }
                    
                }
            }
            closedir($dh);
        }
    }
}
//开始运行
listDir("../../expatiatephp");

/*
 * 遍历单层文件夹
 */

function get_dir_scandir(){ 
$tree = array(); 
foreach(scandir('../') as $single){ 
echo $single."<br/>\r\n"; 
} 
} 
get_dir_scandir(); 

function get_dir_glob(){ 
$tree = array(); 
foreach(glob('../*') as $single){ 
echo $single."<br/>\r\n"; 
} 
} 
get_dir_glob(); 

?>

