<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of oneMyMySql
 *
 * @author BetterFeng
 */
header("Content-Type:text/html;charset=utf-8");

class oneMyMySqli {

    private static $oneMySQLi = null;

    private function __construct() {
        echo '连接数据库成功<br>';
    }

    static function getInstance() {
        if (is_null(self::$oneMySQLi)) {
            self::$oneMySQLi = new self();
        }
        return self::$oneMySQLi;
    }

    function query($sql) {
        echo $sql;
    }

    function __destruct() {
        echo '断开数据连接';
    }

}

$onemy = oneMyMySqli::getInstance();
$onemy->query("select bookName,bookAuthor from books where bookCategoryId=1");

