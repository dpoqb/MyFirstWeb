<?php
    try{
        $link = new PDO("mysql:dbname=bookstore;host=localhost", "root","123456");
    }catch (PDOException $e){
        echo "数据库连接失败",$e->getMessage();
    }
    $link->query("SET NAMES UTF8");
    $link->query("set character utf-8");
?>