<?php

if(isset($_GET["action"])){
//    echo $_GET["action"];
    if($_GET["action"] == 'showtables'){
        $output = "接口调用成功!";
        exit(json_encode($output));
    } else {
        exit(json_encode($_GET["action"]));
    }
    
}
?>

