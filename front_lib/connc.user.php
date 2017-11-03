<?php
try{
    $link = new PDO("mysql:dbname=bookstore;host=localhost", "general_user","123456");
}catch (PDOException $e){
    echo "数据库连接失败";
}
$link->query("SET NAMES UTF8");
$link->query("set character utf-8");
?>