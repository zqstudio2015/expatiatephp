<!DOCTYPE html>
<!--
文件名： multidimensionalarray.php
字符编码：UTF-8  
版权所有:Copyright (C) 2015 Zhao Qun Studio Co.,Ltd
网站地址:http://zqstudio.ecip.net
作者:Better Feng
邮箱:2360680821@qq.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
//        索引数组
        $arrayindex = array("编号", "姓名", "单位", "城市", "电话");
        $arrayindex0 = array(1, "高某", "A公司", "北京市", "(010)110");
        $arrayindex1 = array(2, "富某", "B公司", "北京市", "(010)112");
        $arrayindex2 = array(3, "帅某", "C公司", "北京市", "(010)114");
//        关联数组
        $arrayassociative = array("id" => 1, "name" => "富某", "company" => "A公司", "city" => "北京");
//        多维数组
        $arraymulti = array(
            $arrayindex,
            $arrayindex0,
            $arrayindex1,
            $arrayindex2,
        );
        
        $arraymulti1 = array(
            $arrayindex,
            $arrayindex0,
            $arrayindex1,
            $arrayindex2,
            $arrayassociative
        );
        
        echo count($arraymulti) . "<br>";
        echo count($arraymulti[1]) . "<br>";

        function createtable($tableName, $tablearray) {
            $str_table = "";
            $str_table = "<table align='center' border='1' width='600'>";
            $str_table .= "<caption><h1>$tableName</h1></caption>";

            for ($out = 0; $out < count($tablearray); $out++) {
                if ($out % 2 != 0)
                    $bgcolor = "#ffffff";
                else
                    $bgcolor = "#dddddd";
                $str_table .= "<tr bgcolor=" . $bgcolor . ">";
                if ($out == 0) {
                    for ($in = 0; $in < count($tablearray[$out]); $in++) {
                        $str_table .= "<th>" . $tablearray[$out][$in] . "</th>";
                    }
                } else {
                    for ($in = 0; $in < count($tablearray[$out]); $in++) {
                        $str_table .= "<td>" . $tablearray[$out][$in] . "</td>";
                    }
                }
                $str_table .= "</tr>";
            }
            $str_table .= "</table>";

            return $str_table;
        }
        
        function createtable2($tableName, $tablearray) {
            $str_table = "";
            $str_table = "<table align='center' border='1' width='600'>";
            $str_table .= "<caption><h1>$tableName</h1></caption>";

            for ($out = 0; $out < count($tablearray); $out++) {
                if ($out % 2 != 0)
                    $bgcolor = "#ffffff";
                else
                    $bgcolor = "#dddddd";
                $str_table .= "<tr bgcolor=" . $bgcolor . ">";
                if ($out == 0) {
                    foreach ($tablearray[$out] as $invalue){
                        $str_table .= "<th>" . $invalue. "</th>";
                    }                    
                } else {
                    foreach ($tablearray[$out] as $invalue){
                        $str_table .= "<td>" .$invalue. "</td>";
                    }
                }
                $str_table .= "</tr>";
            }
            $str_table .= "</table>";

            return $str_table;
        }

        $str_table = createtable("联系人列表", $arraymulti);
        echo $str_table;
        echo createtable2("联系人列表1", $arraymulti1)
        ?>
    </body>
</html>
