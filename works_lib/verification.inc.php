<?php
    include "connc.php";
    if($_GET['action'] == 'insert'){
        $ver_title = trim($_POST['article_title']);
        $sql = "SELECT * FROM article_title_view WHERE article_title LIKE '{$ver_title}'";
        $result=$link->query($sql);
        if($result) {
            if ($result->rowCount() > 0) {
                echo "<script>alert(\"该论文标题已经存在\")</script>";
                die();
            }
        }
    }
    if($_GET['action'] == 'update'){
        $ver_title = trim($_POST['article_title']);
        $ID = $_POST['id'];
        $sql = "SELECT * FROM article_title_view WHERE id != {$ID} AND article_title LIKE '{$ver_title}'";
        $result=$link->query($sql);
        if($result) {
            if ($result->rowCount() > 0) {
                echo "<script>alert(\"该论文标题已经存在\")</script>";
                die();
            }
        }
    }
    mysqli_close($link);
?>
