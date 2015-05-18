<!DOCTYPE html>
<!--
文件名： arraysort.php
字符编码：UTF-8  
版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>数组排序</title>
    </head>
    <body>
        <?php
        print_r("<pre>");
        echo "<h3>简单数组排序</h3>";
        $arraysort1 = array(5, 8, 7, 9, 2);
        sort($arraysort1);
        print_r($arraysort1);
        print_r("<br>");
        rsort($arraysort1);
        print_r($arraysort1);

        echo "<h3>自然数组排序</h3>";
        $arraysort2 = array("file1.txt", "file12.txt", "file2.txt", "File2.txt", "File12.txt", "file.txt");
        natsort($arraysort2);
        print_r($arraysort2);
        print_r("<br>");
        natcasesort($arraysort2);
        print_r($arraysort2);
        print_r("<br>");

        print_r("<h3>多维数组排序</h3>");
        $multiarray = array(
            array("id" => 1, "soft" => "Linux", "rating" => 3),
            array("id" => 2, "soft" => "Apache", "rating" => 1),
            array("id" => 3, "soft" => "MySQL", "rating" => 4),
            array("id" => 4, "soft" => "PHP", "rating" => 2),
        );
//        $softs = array();
//        $ratings = array();
        foreach ($multiarray as $key => $value) {
            $softs[$key] = $value["soft"];
            $ratings[$key] = $value["rating"];
        }
        array_multisort($ratings, $softs, $multiarray);
        print_r($multiarray);
        
        ?>
    </body>
</html>
