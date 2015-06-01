<?php
session_start();
if (isset($_POST['submit'])) {
    if (strtolower(trim($_POST["test"])) == strtolower($_SESSION['validationcode'])) {
        echo '提交成功';
    } else {
        echo '<font color="red">验证码输入错误！！</font>';
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>动态图像验证码测试</title>
        <script>
            function newgdcode(obj, url) {
                obj.src = url + '?nowtime=' + new Date().getTime();
            }
        </script>
    </head>
    <body>
        <img src ="imgcode.php" alt="看不清楚，换一张" style="cursor:pointer;" onclick="javascript:newgdcode(this, this.src);" >
        <!--<img src="imgcode.php" alt="dd">-->
        <form method="POST" action="image.php">
            <input type="text" name="test"><br>
            <input type="submit" name="submit" value="提交">
        </form>
    </body>
</html>
