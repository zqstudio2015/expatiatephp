<?php

/*
 * 文件名： MyDB_class.php
 * 字符编码：UTF-8  
 * 版权所有: Copyright©2014-2015 Zhao Qun Studio Co.,Ltd
 * 网站地址:http://zqstudio.ecip.net
 * 作者:Better Feng
 * 邮箱:2360680821@qq.com
 */

/**
 * Description of MyDB_class
 *
 * @author Better
 */
class MyDB {
    protected $mysqli;
    protected $showError;
    
    /*本类的构造方法，用来创建 mysqli 对象并连接数据库，和初始化一些成员属性
     * 
     */
    public function __construct($configFile = "password.inc.php", $showError = TRUE) {
        require_once ($configFile);
        $this->mysqli = new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);
        if(mysqli_connect_errno()){
            $this->printError("连接失败，原因为：".mysqli_connect_error());
            $this->mysqli = FALSE;
            exit();
        }
        $this->showError = $showError;
    }
    
    /*公用的错误信息输出格式，调用时将草屋信息通过参数传入
     * 参数：errorMessage 错误信息
     */
    protected function printError($errorMessage){
        if($this->showError){
            echo '<p><font color="red">'.htmlspecialchars($errorMessage).'</font></p>';
        }
    }
    
    public function close(){
        if($this->mysqli){
            $this->mysqli->close();
        }
        $this->mysqli = FALSE;
    }
    
    public function __destruct() {
        $this->close();
    }
}
